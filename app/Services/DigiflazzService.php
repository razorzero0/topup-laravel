<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Log;

class DigiflazzService
{
    protected $client;

    public function __construct()
    {
        // Inisialisasi Guzzle client dengan base URI Digiflazz
        $this->client = new Client([
            'base_uri' => 'https://api.digiflazz.com/v1/',
            'timeout'  => 10.0,  // Waktu timeout 10 detik
        ]);
    }

    public function makeTransaction($customerNo, $refId, $buyerSkuCode)
    {
        // Mendapatkan data dari environment (.env)
        $username = env('DIGIFLAZZ_USERNAME');
        $key = env('DIGIFLAZZ_PRODUCTION_KEY');

        // Membuat sign berdasarkan aturan Digiflazz (username + key + ref_id)
        $sign = md5($username . $key . $refId);

        // Data yang akan dikirim ke API Digiflazz
        $body = [
            'username' => $username,
            'buyer_sku_code' => $buyerSkuCode,  // SKU produk dari Digiflazz
            'customer_no' => $customerNo,  // Nomor pelanggan
            'ref_id' => $refId,  // ID unik untuk transaksi
            'sign' => $sign,  // Signature untuk verifikasi transaksi
            'testing' => true,  // Signature untuk verifikasi transaksi
        ];
        try {
            // Mengirim request POST ke API Digiflazz
            $response = $this->client->post('transaction', [
                'json' => $body
            ]);

            // Mengambil respons dan mengembalikannya dalam bentuk JSON
            $result = json_decode($response->getBody(), true);
            return $result;
        } catch (\Exception $e) {
            // Menangani error jika terjadi
            Log::error('Error in Digiflazz transaction: ' . $e->getMessage());
            return ['error' => 'Terjadi kesalahan dalam proses transaksi.'];
        }
    }
    public function PriceList()
    {
        // Mendapatkan data dari environment (.env)
        $username = env('DIGIFLAZZ_USERNAME');
        $key = env('DIGIFLAZZ_PRODUCTION_KEY');

        // Membuat sign berdasarkan aturan Digiflazz (username + key + ref_id)
        $sign = md5($username . $key . 'pricelist');

        // Data yang akan dikirim ke API Digiflazz
        $body = [
            'cmd' => 'prepaid',  // SKU produk dari Digiflazz
            'username' => $username,
            'sign' => $sign,  // Signature untuk verifikasi transaksi
        ];

        try {
            // Pastikan menggunakan Collection

            // Mengirim request POST ke API Digiflazz
            $response = $this->client->post('price-list', [
                'json' => $body
            ]);

            // Mengambil respons dan mengembalikannya dalam bentuk Collection
            $result = json_decode($response->getBody(), true);

            // Mengubah data menjadi Collection
            $data = collect($result['data']);

            return $data;
        } catch (\Exception $e) {
            // Menangani error jika terjadi
            Log::error('Error in Digiflazz transaction: ' . $e->getMessage());
            return ['error' => 'Terjadi kesalahan dalam proses transaksi.'];
        }
    }
    public function cekSaldo()
    {
        // Mendapatkan data dari environment (.env)
        $username = env('DIGIFLAZZ_USERNAME');
        $key = env('DIGIFLAZZ_PRODUCTION_KEY');

        // Membuat sign berdasarkan aturan Digiflazz (username + key + ref_id)
        $sign = md5($username . $key . 'depo');

        // Data yang akan dikirim ke API Digiflazz
        $body = [
            'cmd' => 'deposit',  // SKU produk dari Digiflazz
            'username' => $username,
            'sign' => $sign,  // Signature untuk verifikasi transaksi
        ];

        try {
            // Mengirim request POST ke API Digiflazz
            $response = $this->client->post('cek-saldo', [
                'json' => $body
            ]);

            // Mengambil respons dan mengembalikannya dalam bentuk JSON
            $result = json_decode($response->getBody(), true);
            return $result;
        } catch (\Exception $e) {
            // Menangani error jika terjadi
            Log::error('Error in Digiflazz transaction: ' . $e->getMessage());
            return ['error' => 'Terjadi kesalahan dalam proses transaksi.'];
        }
    }
}
