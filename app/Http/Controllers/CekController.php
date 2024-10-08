<?php

namespace App\Http\Controllers;

use App\Services\DigiflazzService;
use App\Services\MailtrapService;
use Illuminate\Http\Request;

class CekController extends Controller
{
    protected $digiflazzService, $ref_id, $mailtrapService;

    public function __construct(DigiflazzService $digiflazzService, MailtrapService $mailtrapService)
    {
        $this->digiflazzService = $digiflazzService;
        $this->ref_id = uniqid('cekId-');
        $this->mailtrapService = $mailtrapService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $response = $this->digiflazzService->makeTransaction($id, $this->ref_id, 'ffu');
        // dd($id);

        if ($response['data']['status']) {
            $from = [
                'email' => 'admin@algoora.biz.id',
                'name' => 'Algoora'
            ];

            $to = ['muhainun059@gmail.com'];
            $subject = 'Info Transaksi';
            // Mengambil tanggal dan waktu saat ini dalam format WIB
            $dateTime = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
            $formattedDateTime = $dateTime->format('d/m/Y H:i:s');

            // Membuat pesan dengan interpolasi variabel yang benar
            $text = "Hallo yayan, \n\n" .
                "Terima kasih telah menggunakan Algoora🤗. Berikut informasi mengenai transaksi Anda:\n\n" .
                "Nama: yayan\n" .
                "Item: Mobile Legends 5 diamonds\n" .
                "Harga: Rp. 4.000\n" .
                // "Umur: {$data->age} thn\n" .
                "Tanggal: {$formattedDateTime} WIB \n" .
                "Regards,\nAlgoora.biz.id";


            $this->mailtrapService->sendEmail($from, $to, $subject, $text);
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
