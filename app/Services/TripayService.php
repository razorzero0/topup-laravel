<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class TripayService
{
    protected $apiKey;
    protected $privateKey;
    protected $merchantCode;
    protected $client;

    public function __construct()
    {
        if (env('APP_ENV') == "production") {

            $this->apiKey = env('TRIPAY_API_KEY');
            $this->privateKey = env('TRIPAY_PRIVATE_KEY');
            $this->merchantCode = env('TRIPAY_MERCHANT_CODE');
            $this->client = new Client([
                'base_uri' => 'https://tripay.co.id/api/', // Ganti saat production
            ]);
        } else {
            $this->apiKey = env('DEV_TRIPAY_API_KEY');
            $this->privateKey = env('DEV_TRIPAY_PRIVATE_KEY');
            $this->merchantCode = env('DEV_TRIPAY_MERCHANT_CODE');
            $this->client = new Client([
                'base_uri' => 'https://tripay.co.id/api-sandbox/', // Ganti saat production
            ]);
        }
    }

    /**
     * Get payment channels from Tripay API
     */
    public function getPaymentChannels()
    {
        try {
            $response = $this->client->request('GET', 'merchant/payment-channel', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error('Error fetching payment channels: ' . $e->getMessage());
            return []; // Kembalikan array kosong jika error
        }
    }

    /**
     * Create a transaction with Tripay API
     */
    public function makeTransaction($method, $merchantRef, $amount, $customerDetails, $orderItems)
    {
        $data = [
            'method'         => $method, // Sesuaikan metode pembayaran
            'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name'  => $customerDetails['name'],
            'customer_email' => $customerDetails['email'],
            'customer_phone' => $customerDetails['phone'],
            'order_items'    => $orderItems,
            // 'callback_url'     => 'https://domainanda.com/redirect',
            // 'return_url'     => 'https://domainanda.com/redirect',
            'expired_time'   => (time() + (24 * 60 * 60)), // Expire setelah 24 jam
            'signature'      => hash_hmac('sha256', $this->merchantCode . $merchantRef . $amount, $this->privateKey),
        ];

        try {
            // Lakukan request dengan format JSON
            $response = $this->client->request('POST', 'transaction/create', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json' => $data // Kirim data dalam format JSON
            ]);

            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        } catch (\Exception $e) {
            Log::error('Tripay API Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => $e,
            ];
        }
    }
}
