<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        // User::factory(10)->create();
        //Role Creation
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'guest']);

        $guest = User::create([
            'id' => 0,
            'name' => 'guest',
            'email' => 'guest@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'muhainun059@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'muhainun058@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        // Register Role  & Permission to Users
        $guest->assignRole('guest');
        $admin->assignRole('admin');
        $user->assignRole('user');


        Invoice::create([
            'id' => 'ALG83037', // Ganti sesuai kebutuhan, misalnya UUID
            'tripay_reference' => 'DEV-T34796180074P1S0B', // Referensi dari Tripay
            'method' => 'SHOPEEPAY', // Kode channel pembayaran
            'merchant_ref' => 'ALG83037', // Nomor invoice atau order dari sistem Anda
            'amount' => 10468, // Jumlah total pembayaran
            'total_fee' => 1000, // Total biaya
            'amount_received' => 9468, // Jumlah yang diterima
            'customer_name' => 'user83037', // Nama pelanggan
            'customer_email' => 'adad@gmail.com', // Email pelanggan
            'customer_phone' => '085731013100', // Nomor HP pelanggan
            'callback_url' => null, // URL untuk menerima callback notifikasi transaksi
            'return_url' => null, // URL untuk mengalihkan pelanggan setelah pembayaran
            'status' => 'UNPAID', // Status pembayaran
            'expired_time' => 1728052877, // Batas waktu pembayaran dalam format unix timestamp
            'pay_url' => 'https://tripay.co.id/checkout/DEV-T34796180074P1S0B', // URL pembayaran
            'checkout_url' => 'https://tripay.co.id/checkout/DEV-T34796180074P1S0B', // URL checkout
            'order_items' => json_encode([ // Rincian produk dalam format JSON
                [
                    'sku' => null,
                    'name' => 'MOBILELEGEND - 5 Diamond',
                    'price' => 10468,
                    'quantity' => 1,
                    'subtotal' => 10468,
                    'product_url' => null,
                    'image_url' => null,
                ]
            ]),
            'instructions' => json_encode([ // Instruksi pembayaran dalam format JSON
                [
                    'title' => 'Pembayaran via ShopeePay',
                    'steps' => [
                        'Klik tombol Lanjutkan Pembayaran',
                        'Anda akan dialihkan ke aplikasi Shopee',
                        'Akan muncul detail transaksi. Pastikan data transaksi sudah sesuai',
                        'Klik tombol <b>Bayar</b> dan masukkan <b>PIN</b>',
                        'Transaksi selesai. Simpan bukti pembayaran Anda'
                    ]
                ]
            ]),
            'created_at' => now(), // Tanggal dan waktu saat ini
            'updated_at' => now(), // Tanggal dan waktu saat ini
        ]);
    }
}
