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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_pengguna')->unsigned()->nullable();
            $table->foreign('kode_pengguna')->references('id')->on('users')->onDelete('cascade');
            $table->string('ref_id');
            $table->string('customer_no');
            $table->string('buyer_sku_code');
            $table->string('status');
            $table->integer('buyer_last_saldo');
            $table->string('sn');
            $table->bigInteger('price')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
