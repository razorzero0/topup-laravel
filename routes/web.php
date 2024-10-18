<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\callback\DigiflazzCallback;
use App\Http\Controllers\callback\TripayCallback;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CekController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PaymentChannelController;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UsersController;
use App\Livewire\About;
use App\Livewire\CekTransaksi;
use App\Livewire\Feedback;
use App\Livewire\Home;
use App\Livewire\Invoice;
use App\Livewire\Product;
use App\Livewire\Product\Information;
use App\Livewire\ProductDetail;
use App\Livewire\TermCondition;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;





Route::get('/', Home::class)->name('index');
Route::get('/about', About::class)->name('about');
Route::get('/feedback', Feedback::class)->name('feedback');
// Route::resource('home', HomeController::class);

Route::post('/cekDiskon', [CouponController::class, 'cekDiskon'])->name('cekDiskon');

Route::post('/makeTransaction', [TransactionController::class, 'makeTransaction'])->name('makeTransaction');

Route::get('/cek-transaksi', CekTransaksi::class)->name('cek-transaksi');

// Route::get('/cek/{id}', [CekController::class, 'show'])->name('cek');
Route::get('/get-product', [ProductController::class, 'getProduct'])->name('get-product');
// Route::get('/pd/{slug}', [ProductController::class, 'show'])->name('product-detail');
Route::get('/topup/{slug}', ProductDetail::class)->name('product-detail');

Route::get('/invoice/{id}', Invoice::class)->name('invoice');
Route::get('/terms-conditions', TermCondition::class)->name('terms-conditions');

// Route::get('/payment/callback', [Product::class, 'show']);
Route::post('/tripay/callback', [TripayCallback::class, 'handle']);
Route::post('/digiflazz/callback', [DigiflazzCallback::class, 'handle']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('transaction', TransactionController::class);
});
Route::middleware('role:admin')->group(function () {


    Route::resource('users', UsersController::class);
    Route::resource('coupon', CouponController::class);
    Route::resource('product', ProductController::class);
    Route::resource('item', ItemController::class);
    Route::post('disable-all-item', [ItemController::class, 'disableAllItem'])->name('disable-all-item');
    Route::post('enable-all-item', [ItemController::class, 'enableAllItem'])->name('enable-all-item');
    Route::get('items/{id}', [ItemController::class, 'getItem'])->name('get-item');
    Route::get('list-items/{id}', [ItemController::class, 'listItem'])->name('list-item');
    Route::resource('category', CategoryController::class);
    Route::resource('popular-item', PopularController::class);
    Route::resource('files', FileController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('payment-channel', PaymentChannelController::class);
});
Route::get('/google/redirect', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

require __DIR__ . '/auth.php';
