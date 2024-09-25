<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DigiflazzService;

class HomeController extends Controller
{

    protected $digiflazzService;

    public function __construct(DigiflazzService $digiflazzService)
    {
        $this->digiflazzService = $digiflazzService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $response = $this->digiflazzService->makeTransaction('619227230');
        // $response = $this->digiflazzService->makeTransaction('619227230', 'ssss', 'ffu');

        // // Mengembalikan respons dari API Digiflazz
        // return response()->json($response);

        $data = collect([
            'ml' => [
                'name' => 'MOBILE LEGENDS',
                'img' => 'assets/img/ml.webp',
            ],
            'ffmax' => [
                'name' => 'FREE FIRE MAX',
                'img' => 'assets/img/ffmax.jpg',
            ],
            'ff' => [
                'name' => 'FREE FIRE',
                'img' => 'assets/img/ff.jpg',
            ],
            'gs' => [
                'publisher' => '',
                'name' => 'GARENA SHELL',
                'img' => 'assets/img/garena-sheel.png',
                'deskripsi' => 'Garena Shell adalah mata uang virtual yang bisa digunakan untuk membeli item dan layanan di platform game Garena dan game-game yang dioperasikan Garena. Garena Shell bisa digunakan untuk mengisi Diamond Free Fire, Voucher di Arena of Valor, atau RP di League of Legends.',
            ],
        ]);
        return view('home.home', ['data' => $data]);
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
