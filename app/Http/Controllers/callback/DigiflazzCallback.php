<?php

namespace App\Http\Controllers\callback;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Transaction;
use App\Services\WhatsappService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DigiflazzCallback extends Controller
{
    protected $secret, $whatsappService, $no;

    public function __construct(WhatsappService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
        $this->secret = env('DIGIFLAZZ_SECRET');
        $this->no = env('APP_NO');
    }

    public function handle(Request $request)
    {
        // Log::info('Webhook accessed', ['ip' => $request->ip(), 'headers' => $request->headers->all()]);
        $post_data = file_get_contents('php://input');
        $signature = hash_hmac('sha1', $post_data, $this->secret);

        $data = json_decode($request->getContent(), true);
        Log::info($data);
        $data = $data['data'];
        if ($request->header('X-Hub-Signature') == 'sha1=' . $signature) {
            // Decode JSON
            $trx = Transaction::where('ref_id', $data['ref_id'])->first();
            $trx->update(['status' =>  $data['status']]);
            $trx->update(['sn' =>  $data['sn']]);
            $trx->update(['buyer_last_saldo' =>  $data['buyer_last_saldo']]);
            $item = Item::where('buyer_sku_code', $data['buyer_sku_code'])->first();
            if ($data['status'] == "Sukses") {
                $item->decrement('stock');
            }
            $this->whatsappService->validasiMessage($trx->ref_id, $this->no, $trx->price, $data['status'], $trx->buyer_sku_code);
        }
    }
}
