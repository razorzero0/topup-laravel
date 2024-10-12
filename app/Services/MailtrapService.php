<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MailtrapService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('MAILTRAP_API_KEY'); // Menggunakan MAILTRAP_API_KEY
    }

    public function sendEmail($from, $to, $subject, $status, $price, $item)
    {
        $url = 'https://send.api.mailtrap.io/api/send';
        $dateTime = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
        $time = $dateTime->format('d/m/Y H:i:s');

        $data = [
            'from' => [
                'email' => $from['email'],
                'name' => $from['name'],
            ],
            'to' => array_map(function ($recipient) {
                return ['email' => $recipient];
            }, $to),
            'subject' => $subject,
            'html' => '<p>Yth. Pelanggan,</p>' .
                '<p>Terima kasih atas kepercayaan Anda dalam menggunakan layanan kami. Berikut adalah rincian lengkap dari transaksi pembayaran Anda:</p>' .
                '<hr>' .
                '<p><strong>ID Pembayaran:</strong> ' . $from['id'] . '</p>' .
                '<p><strong>Jumlah Pembayaran:</strong> Rp ' . number_format($price, 0, ',', '.') . '</p>' .
                '<p><strong>Status Pembayaran:</strong> ' . $status . '</p>' .
                '<p><strong>Item yang Dibeli:</strong> ' . $item . '</p>' .
                '<p><strong>Waktu Pembayaran:</strong> ' . $time . ' WIB</p>' .
                '<hr>' .
                '<p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi tim kami. Kami dengan senang hati akan membantu Anda.</p>' .
                '<p>Pastikan untuk menyimpan email ini sebagai referensi di masa mendatang, terutama jika diperlukan untuk verifikasi atau pengecekan lebih lanjut terkait transaksi ini.</p>' .
                '<p>Salam hormat,</p>' .
                '<p><strong>Tim Layanan Algoora</strong></p>',
        ];


        try {
            $response = $this->client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            // Tangani kesalahan (log atau kembalikan respons)
            return ['error' => $e->getMessage()];
        }
    }
}
