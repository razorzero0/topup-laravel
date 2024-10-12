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
                'id' => 4,
                'slug' => 'indosat',
                'category_id' => 2,
                'name' => 'INDOSAT',
                'company' => 'Indosat Ooredoo Hutchison',
                'image' => 'images/1728718680.png',
                'description' => '<p><strong>Langkah-langkah Isi Pulsa Indosat di Algoora :</strong></p><ol><li>Masukkan nomor WhatsApp (untuk notifikasi status transaksi).</li><li>Input nomor HP Indosat yang ingin diisi pulsa.</li><li>Pilih nominal pulsa yang diinginkan.</li><li>Pilih metode pembayaran.</li><li>Masukkan kode kupon (opsional).</li><li>Klik "Beli Sekarang."</li></ol>',
                'created_at' => '2024-10-12 07:16:36',
                'updated_at' => '2024-10-12 12:40:30',
            ],
        ]);
    }
}
