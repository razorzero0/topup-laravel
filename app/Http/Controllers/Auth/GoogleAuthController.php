<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if (!$user) {
            // Jika user belum ada, buat user baru
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => bcrypt(str_random(16)), // Password random
                'email_verified_at' => now(), // Otomatis verifikasi email
            ]);
        } elseif (!$user->hasVerifiedEmail()) {
            // Verifikasi email jika belum diverifikasi
            $user->email_verified_at = now();
            $user->save();
        }

        Auth::login($user);

        return redirect('/dashboard');
    }
}
