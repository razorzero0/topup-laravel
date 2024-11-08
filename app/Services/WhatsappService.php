<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class WhatsappService
{


    public function sendMessage($id, $name, $target, $price, $item, $status)
    {
        // Variabel untuk setiap parameter
        $redirect = 'https://fonnte.com';
        $token = env('FONNTE_TOKEN');

        // Membuat URL untuk hasil diagnosis
        // $diagnosisUrl = route('cetak-diagnosis', $data->diagnosis_id);

        // Mengambil tanggal dan waktu saat ini dalam format WIB
        $dateTime = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
        $formattedDateTime = $dateTime->format('d/m/Y H:i:s');
        $price = number_format($price, 0, ',', '.');
        $status = strtoupper($status);
        // Membuat pesan dengan interpolasi variabel yang benar
        $message = "Hallo *{$name}*, \n\n" .
            "Terima kasih telah menggunakan Algoora🤗. Berikut informasi mengenai pembayaran anda:\n\n" .
            "ID: {$id}\n" .
            "Item: {$item}\n" .
            "Harga: Rp {$price}\n" .
            "Status Pembayaran: *{$status}*\n" .
            "Tanggal: {$formattedDateTime} WIB \n\n" .
            "Regards,\n*Algoora Store*";

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
        return $response;
    }

    public function validasiMessage($id, $target, $price, $status, $code, $sn)
    {
        // Variabel untuk setiap parameter
        $redirect = 'https://fonnte.com';
        $token = env('FONNTE_TOKEN');

        // Membuat URL untuk hasil diagnosis
        // $diagnosisUrl = route('cetak-diagnosis', $data->diagnosis_id);

        // Mengambil tanggal dan waktu saat ini dalam format WIB
        $dateTime = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
        $formattedDateTime = $dateTime->format('d/m/Y H:i:s');
        $price = number_format($price, 0, ',', '.');
        $status = strtoupper($status);
        // Membuat pesan dengan interpolasi variabel yang benar
        $message = "dari *{$id}*, \n\n" .
            "Berikut informasi mengenai transaksi user:\n\n" .
            "ID: {$id}\n" .
            "Harga: Rp {$price}\n" .
            "Kode Item:  *{$code}*\n" .
            "Status: *{$status}*\n" .
            "Ket.: {$sn} WIB \n\n" .
            "Tanggal: {$formattedDateTime} WIB \n\n";

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
        return $response;
    }
    public function sendMessageFail($id, $name, $target, $price, $item, $status, $error)
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
        $message = "Disini bot, \n\n" .
            "Ada Transaksi yang gagal dari *{$name}*:\n\n" .
            "ID: {$id}\n" .
            // "Nama: {$name}\n" .
            "Item: {$item}\n" .
            "Harga: {$price}\n" .
            "Status pembayaran: {$status}\n" .
            "Error: {$error}\n" .
            // "Umur: {$data->age} thn\n" .
            "Tanggal: {$formattedDateTime} WIB \n" .
            "Regards,\n*Algoora Store*";

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
