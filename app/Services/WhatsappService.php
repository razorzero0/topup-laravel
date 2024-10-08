<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class WhatsappService
{


    public function sendMessage($name, $target, $price, $item)
    {
        // Variabel untuk setiap parameter
        $redirect = 'https://fonnte.com';
        $token = env('FONNTE_TOKEN');

        // Membuat URL untuk hasil diagnosis
        // $diagnosisUrl = route('cetak-diagnosis', $data->diagnosis_id);

        // Mengambil tanggal dan waktu saat ini dalam format WIB
        $dateTime = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
        $formattedDateTime = $dateTime->format('d/m/Y H:i:s');

        // Membuat pesan dengan interpolasi variabel yang benar
        $message = "Hallo *{$name}*, \n\n" .
            "Terima kasih telah menggunakan Algoora🤗. Berikut informasi mengenai transaksi Anda:\n\n" .
            "Nama: {$name}\n" .
            "Item: {$item}\n" .
            "Harga: {$price}\n" .
            // "Umur: {$data->age} thn\n" .
            "Tanggal: {$formattedDateTime} WIB \n" .
            "Regards,\n*Algoora.biz.id*";

        // Encode parameter message
        $encodedMessage = urlencode($message);

        // Buat URL lengkap dengan parameter yang di-encode
        $url = "https://api.fonnte.com/send?redirect=" . urlencode($redirect) .
            "&token=" . urlencode($token) .
            "&target=" . urlencode($target) .
            "&message=" . $encodedMessage;

        // Kirim permintaan GET menggunakan Http Client
        $response = Http::get($url);

        // Kembalikan true jika pesan berhasil dikirim, atau false jika gagal
        return $response->successful();
    }
}
