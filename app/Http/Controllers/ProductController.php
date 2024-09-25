<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductController extends Controller
{
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $data = $this->getProductDetails($id);
        if ($data) {
            return view('product.detail', [
                'data' => $data,
            ]);
        } else {
            return redirect('/')->with('error', 'Mohon maaf atas ganggunannya, silahkan coba lagi');
        }
    }

    public function getProductDetails($id)
    {
        // Step 1: Inisialisasi Guzzle Client
        $client = new Client();

        // Step 2: Mendapatkan data dari API Digiflazz
        try {
            $response = $client->post('https://api.digiflazz.com/v1/price-list', [
                'json' => [
                    'cmd' => 'prepaid',
                    'username' => env('DIGIFLAZZ_USERNAME'),
                    'sign' => md5(env('DIGIFLAZZ_USERNAME') . env('DIGIFLAZZ_PRODUCTION_KEY') . 'pricelist'),
                ]
            ]);

            $responseBody = $response->getBody()->getContents();
            $result = json_decode($responseBody, true);

            // Step 3: Koleksi data lokal (game descriptions)
            $data = collect([
                'ml' => [
                    'name' => 'MOBILE LEGENDS',
                    'img' => 'assets/img/ml.webp',
                    'deskripsi' => 'Mobile Legends: Bang Bang adalah game Multiplayer Online Battle Arena (MOBA) yang dikembangkan oleh Moonton.',
                ],
                'ffmax' => [
                    'name' => 'FREE FIRE MAX',
                    'img' => 'assets/img/ffmax.jpg',
                    'deskripsi' => 'Free Fire atau FF adalah game battle royale gratis yang dikembangkan oleh Garena.',
                ],
                'ff' => [
                    'name' => 'FREE FIRE',
                    'img' => 'assets/img/ff.jpg',
                    'deskripsi' => 'Free Fire atau FF adalah game battle royale gratis yang diterbitkan oleh Garena untuk Android dan iOS.',
                ]
            ]);

            // Step 4: Memetakan brand berdasarkan id request
            $brandMapping = [
                'ml' => 'MOBILE LEGENDS',
                'ff' => 'FREE FIRE',
                'ffmax' => 'FREE FIRE MAX'
            ];

            // Step 5: Filter data API berdasarkan brand sesuai ID yang direquest
            $filteredProducts = collect($result['data'])->reverse()->filter(function ($product) use ($brandMapping, $id) {
                // Debug setiap produk untuk melihat struktur dan brand
                return strtolower($product['brand']) === strtolower($brandMapping[$id]);
            });

            // Step 6: Gabungkan data lokal dengan hasil filter API
            $localData = $data->get($id);
            $combinedData = array_merge($localData, [
                'items' => $filteredProducts->values()->all() // Mengambil produk yang difilter dari API
            ]);

            // Step 7: Mengirim data ke view atau API response
            $final = collect($combinedData)->reverse();
            return $combinedData;
        } catch (\Exception $e) {
            return false;
        }
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
