<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key, bisa diisi dengan UUID atau string lain
            $table->string('tripay_reference')->nullable(); // Primary key, bisa diisi dengan UUID atau string lain
            $table->string('method'); // Kode channel pembayaran (misal: BRIVA)
            $table->string('merchant_ref'); // Nomor invoice atau order dari sistem Anda
            $table->integer('amount'); // Jumlah total pembayaran
            $table->integer('total_fee'); // Jumlah total pembayaran
            $table->integer('amount_received'); // Jumlah total pembayaran
            $table->string('customer_name'); // Nama pelanggan
            $table->string('customer_email')->nullable(); // Email pelanggan
            $table->string('customer_phone')->nullable(); // Nomor HP pelanggan (optional untuk beberapa channel)
            $table->json('order_items'); // Rincian produk dalam format JSON (array)
            $table->string('callback_url')->nullable(); // URL untuk menerima callback notifikasi transaksi
            $table->string('return_url')->nullable(); // URL untuk mengalihkan pelanggan setelah pembayaran
            $table->string('status'); // Batas waktu pembayaran dalam format unix timestamp
            $table->integer('expired_time')->nullable(); // Batas waktu pembayaran dalam format unix timestamp
            $table->string('pay_url')->nullable(); // Batas waktu pembayaran dalam format unix timestamp
            $table->string('checkout_url')->nullable(); // Batas waktu pembayaran dalam format unix timestamp
            $table->json('instructions')->nullable();
            $table->string('qr_url')->nullable();
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
