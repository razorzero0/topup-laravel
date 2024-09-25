<?php

use App\Http\Controllers\CekController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;





Route::resource('item', ProductController::class);
Route::resource('/', HomeController::class);
Route::resource('home', HomeController::class);
Route::resource('transaction', TransactionController::class);
Route::post('/cekDiskon', [CouponController::class, 'cekDiskon'])->name('cekDiskon');

Route::post('/makeTransaction', [TransactionController::class, 'makeTransaction'])->name('makeTransaction');

Route::get('/cek/{id}', [CekController::class, 'show'])->name('cek');





Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::resource('coupon', CouponController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
