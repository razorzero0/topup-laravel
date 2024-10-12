<?php

namespace App\Http\Controllers\callback;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Services\DigiflazzService;
use App\Services\MailtrapService;
use App\Services\WhatsappService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TripayCallback extends Controller
{
    // Isi dengan private key anda
    protected $privateKey, $digiflazz, $whatsappService, $mailtrapService;

    public function __construct(DigiflazzService $digiflazzService, WhatsappService $whatsappService, MailtrapService $mailtrapService)
    {
        $this->mailtrapService = $mailtrapService;
        $this->digiflazz =  $digiflazzService;
        $this->whatsappService =  $whatsappService;
        $this->privateKey = env('TRIPAY_PRIVATE_KEY');
    }

    public function handle(Request $request): JsonResponse
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        // Validasi signature
        if ($signature !== (string) $callbackSignature) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        // Validasi event callback
        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return response()->json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
            ]);
        }

        // Decode JSON
        $data = json_decode($json);

        // Cek kesalahan JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data sent by Tripay',
            ]);
        }

        $invoiceId = $data->merchant_ref;
        $tripayReference = $data->reference;
        $amount = $data->total_amount;
        $findInvoice = Invoice::where('merchant_ref', $invoiceId)->first();
        $itemName = json_decode($findInvoice->order_items, true);
        $trx = Transaction::where('ref_id', $invoiceId)->first();

        $status = strtoupper((string) $data->status);

        // Cek apakah pembayaran sudah ditutup
        if (isset($data->is_closed_payment) && $data->is_closed_payment === 1) {
            $invoice = Invoice::where('merchant_ref', $invoiceId)
                ->where('tripay_reference', $tripayReference)
                ->where('status', 'UNPAID')
                ->first();

            // Jika tidak ada invoice
            if (! $invoice) {
                return response()->json([
                    'success' => false,
                    'message' => 'No invoice found or already paid: ' . $invoiceId,
                ]);
            }

            // Update status invoice sesuai dengan status pembayaran
            switch ($status) {
                case 'PAID':
                    $invoice->update(['status' => 'PAID']);

                    // Send Whatsapp
                    $this->whatsappService->sendMessage($invoiceId, $findInvoice->customer_name, $findInvoice->customer_phone, $findInvoice->amount, $itemName[0]['name'], $status);

                    // Transaksi Digiflazz
                    $stmt = $this->digiflazz->makeTransaction($trx->customer_no, $invoiceId, $trx->buyer_sku_code);

                    //Send Email
                    $from = [
                        'email' => env('MAILTRAP_EMAIL'),
                        'name' => 'Pembayaran ' . $invoiceId,
                        'id' => $invoiceId,
                    ];
                    $to = [env('APP_EMAIL')];
                    $subject = 'Info Payment!';

                    $this->mailtrapService->sendEmail($from, $to, $subject, $status, $findInvoice->amount, $itemName[0]['name']);

                    if (isset($stmt['data']['status'])) {
                        if ($stmt['data']['status'] == 'Pending') {
                            $trx->update(['status' =>  'Pending']);
                        } else {
                            $trx->update(['status' =>  $stmt['data']['status']]);
                            $this->whatsappService->sendMessageFail($invoiceId, $findInvoice->customer_name, env('APP_NO'), $findInvoice->amount, $itemName[0]['name'], $status, $stmt['data']['message']);
                        }
                    } else {
                        $trx->update(['status' =>  'error']);
                        $error = 'undefined';
                        if (isset($stmt['error'])) {
                            $error = $stmt['error'];
                        }
                        $this->whatsappService->sendMessageFail($invoiceId, $findInvoice->customer_name, env('APP_NO'), $findInvoice->amount, $itemName[0]['name'], $status, $error);
                    }

                    break;

                case 'EXPIRED':
                    $invoice->update(['status' => 'EXPIRED']);
                    // Send Whatsapp
                    $this->whatsappService->sendMessage($invoiceId, $findInvoice->customer_name, $findInvoice->customer_phone, $findInvoice->amount, $itemName[0]['name'], $status);


                    //Send Email
                    $from = [
                        'email' => env('MAILTRAP_EMAIL'),
                        'name' => 'Pembayaran ' . $invoiceId,
                        'id' => $invoiceId,
                    ];
                    $to = [env('APP_EMAIL')];
                    $subject = 'Info Payment!';

                    $this->mailtrapService->sendEmail($from, $to, $subject, $status, $findInvoice->amount, $itemName[0]['name']);
                    break;

                case 'FAILED':
                    $invoice->update(['status' => 'FAILED']);
                    // Send Whatsapp
                    $this->whatsappService->sendMessage($invoiceId, $findInvoice->customer_name, $findInvoice->customer_phone, $findInvoice->amount, $itemName[0]['name'], $status);

                    //Send Email
                    $from = [
                        'email' => env('MAILTRAP_EMAIL'),
                        'name' => 'Pembayaran ' . $invoiceId,
                        'id' => $invoiceId,
                    ];
                    $to = [env('APP_EMAIL')];
                    $subject = 'Info Payment!';

                    $this->mailtrapService->sendEmail($from, $to, $subject, $status, $findInvoice->amount, $itemName[0]['name']);
                    break;

                default:

                    //Send Email
                    $from = [
                        'email' => env('MAILTRAP_EMAIL'),
                        'name' => 'Pembayaran ' . $invoiceId,
                        'id' => $invoiceId,
                    ];
                    $to = [env('APP_EMAIL')];
                    $subject = 'Info Payment!';

                    $this->mailtrapService->sendEmail($from, $to, $subject, $status, $findInvoice->amount, $itemName[0]['name']);
                    return response()->json([
                        'success' => false,
                        'message' => 'Unrecognized payment status' . $status,
                    ]);
            }

            return response()->json(['success' => true]);
        }

        // Jika tidak ada aksi yang diambil
        return response()->json([
            'success' => false,
            'message' => 'Payment is not closed or the action is not taken',
        ]);
    }
}
