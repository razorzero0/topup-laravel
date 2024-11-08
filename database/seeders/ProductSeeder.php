<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'slug' => 'mobile-legends',
                'category_id' => 1,
                'name' => 'MOBILE LEGENDS',
                'company' => 'Moonton',
                'image' => 'images/1728718977.webp',
                'description' => '<p><strong>Langkah-langkah Top-Up Mobile Legends di Algoora :</strong></p><ol><li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li><li>Input ID game, format: ID Pengguna + Zone ID, misal 1490345(6532) menjadi <strong>14903456532</strong></li><li>Pilih jumlah diamond.</li><li>Pilih metode pembayaran.</li><li>Masukkan kode kupon (opsional).</li><li>Klik "Beli Sekarang."</li></ol>',
                'created_at' => '2024-10-11 15:30:43',
                'updated_at' => '2024-10-12 12:24:10',
            ],
            [
                'id' => 2,
                'slug' => 'free-fire',
                'category_id' => 1,
                'name' => 'FREE FIRE',
                'company' => 'Garena',
                'image' => 'images/1728718931.jpg',
                'description' => '<p><strong>Langkah-langkah Top-Up Free Fire di Algoora :</strong></p><ol><li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li><li>Input ID game (ID Pengguna) anda.</li><li>Pilih jumlah diamond.</li><li>Pilih metode pembayaran.</li><li>Masukkan kode kupon (opsional).</li><li>Klik "Beli Sekarang."</li></ol>',
                'created_at' => '2024-10-12 06:58:40',
                'updated_at' => '2024-10-12 12:33:21',
            ],
            [
                'id' => 3,
                'slug' => 'honor-of-kings',
                'category_id' => 1,
                'name' => 'Honor of Kings',
                'company' => 'Tencent Games',
                'image' => 'images/1728718742.webp',
                'description' => '<p><strong>Langkah-langkah Top-Up Token Honor of Kings di Algoora :</strong></p><ol><li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li><li>Input ID game (ID Pengguna) anda.</li><li>Pilih jumlah token.</li><li>Pilih metode pembayaran.</li><li>Masukkan kode kupon (opsional).</li><li>Klik "Beli Sekarang."</li></ol>',
                'created_at' => '2024-10-12 07:01:42',
                'updated_at' => '2024-10-12 12:33:05',
            ],
            [
                'id' => 6,
                'slug' => 'dana',
                'category_id' => 3,
                'name' => 'DANA',
                'company' => 'PT Espay Debit Indonesia Koe',
                'image' => 'images/1729354925.jpg',
                'description' => '<p><strong>Langkah-langkah Top-Up DANA di Algoora :</strong></p>
                                  <ol>
                                  <li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>
                                  <li>Input nomer tujuan/hp di akun DANA anda.</li>
                                  <li>Pilih jumlah saldo DANA.</li>
                                  <li>Pilih metode pembayaran.</li>
                                  <li>Masukkan kode kupon (opsional).</li>
                                  <li>Klik "Beli Sekarang."</li>
                                  </ol>',
                'created_at' => '2024-10-19 16:17:12',
                'updated_at' => '2024-10-19 16:44:52',
            ],
            [
                'id' => 7,
                'slug' => 'shopee-pay',
                'category_id' => 3,
                'name' => 'SHOPEE PAY',
                'company' => 'PT Shopee International Indonesia',
                'image' => 'images/1729355071.png',
                'description' => '<p><strong>Langkah-langkah Top-Up ShopeePay di Algoora :</strong></p>
                                  <ol>
                                  <li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>
                                  <li>Input nomer tujuan/hp di akun ShopeePay anda.</li>
                                  <li>Pilih jumlah Saldo ShopeePay.</li>
                                  <li>Pilih metode pembayaran.</li>
                                  <li>Masukkan kode kupon (opsional).</li>
                                  <li>Klik "Beli Sekarang."</li>
                                  </ol>',
                'created_at' => '2024-10-19 16:24:31',
                'updated_at' => '2024-10-19 16:35:43',
            ],
            [
                'id' => 8,
                'slug' => 'ovo',
                'category_id' => 3,
                'name' => 'OVO',
                'company' => 'PT Visionet International',
                'image' => 'images/1729355359.jpg',
                'description' => '<p><strong>Langkah-langkah Top-Up OVO di Algoora :</strong></p>
                                  <ol>
                                  <li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>
                                  <li>Input nomer tujuan/hp di akun OVO anda.</li>
                                  <li>Pilih jumlah saldo OVO.</li>
                                  <li>Pilih metode pembayaran.</li>
                                  <li>Masukkan kode kupon (opsional).</li>
                                  <li>Klik "Beli Sekarang."</li>
                                  </ol>',
                'created_at' => '2024-10-19 16:29:19',
                'updated_at' => '2024-10-19 16:36:22',
            ],
            [
                'id' => 9,
                'slug' => 'grab',
                'category_id' => 3,
                'name' => 'GRAB',
                'company' => 'PT Grab Teknologi Indonesia',
                'image' => 'images/1729355489.png',
                'description' => '<p><strong>Langkah-langkah Top-Up GRAB di Algoora :</strong></p>
                                  <ol>
                                  <li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>
                                  <li>Input nomer tujuan/hp di akun GRAB anda.</li>
                                  <li>Pilih jumlah saldo GRAB.</li>
                                  <li>Pilih metode pembayaran.</li>
                                  <li>Masukkan kode kupon (opsional).</li>
                                  <li>Klik "Beli Sekarang."</li>
                                  </ol>',
                'created_at' => '2024-10-19 16:31:29',
                'updated_at' => '2024-10-19 16:37:13',
            ],
            [
                'id' => 10,
                'slug' => 'indosat',
                'category_id' => 4,
                'name' => 'INDOSAT',
                'company' => 'Indosat Ooredoo Hutchison',
                'image' => 'images/1729355606.png',
                'description' => '<p><strong>Langkah-langkah Top-Up pulsa Indosat di Algoora :</strong></p>
                                  <ol>
                                  <li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li>
                                  <li>Input nomer tujuan/hp&nbsp; anda.</li>
                                  <li>Pilih jumlah pulsa Indosat.</li>
                                  <li>Pilih metode pembayaran.</li>
                                  <li>Masukkan kode kupon (opsional).</li>
                                  <li>Klik "Beli Sekarang."</li>
                                  </ol>',
                'created_at' => '2024-10-19 16:33:26',
                'updated_at' => '2024-10-19 16:38:11',
            ]

        ]);
    }
}
