<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/profile', function () {
    $response = [
        'success' => true,
        'data'    => collect("name"),
        'message' => "berhasil",
    ];

    return response()->json($response, 200);
})->middleware(EnsureTokenIsValid::class);
