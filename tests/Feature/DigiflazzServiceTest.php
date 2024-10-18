<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\DigiflazzService; // Pastikan path sesuai
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
// use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise;

class DigiflazzServiceTest extends TestCase
{

    protected $digiflazzService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->digiflazzService = new DigiflazzService();
    }

    /**
     * Test untuk metode makeTransaction dengan 50 pengguna bersamaan.
     *
     * @return void
     */
    public function testMakeTransactionConcurrent()
    {

        // Simulasi 50 transaksi bersamaan
        $customerNo = '901722342185'; // Ganti dengan nomor pelanggan yang valid

        $buyerSkuCode = 'mlu'; // Ganti dengan SKU produk yang valid

        // Array untuk menyimpan promise
        $promises = [];

        for ($i = 0; $i < 50; $i++) {
            $refId = 'test_ref_id_' . uniqid();
            // Menggunakan Promise untuk setiap transaksi
            $promises[] = $this->digiflazzService->makeTransaction($customerNo, $refId . '_' . $i, $buyerSkuCode);
        }

        // Tunggu semua promise untuk diselesaikan
        // $responses = Promise\Utils::settle($promises)->wait();
        $results = Promise\Utils::settle($promises)->wait();

        // Memeriksa hasil
        foreach ($results as $result) {
            print_r($result);
            // Memeriksa apakah tidak ada error
            $this->assertArrayNotHasKey('error', $result);
            // Memeriksa status atau data yang diharapkan dari respons
            // Misalnya, memeriksa apakah ID transaksi atau status berhasil
            // $this->assertEquals('expected_value', $result['data']['status']);
        }
    }
}
