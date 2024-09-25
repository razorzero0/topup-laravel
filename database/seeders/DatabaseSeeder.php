<?php

namespace Database\Seeders;

use App\Models\Coupon;
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

        Coupon::create([
            'name' => 'koing69',
            'stock' => '3',
            'percent' => '100'
        ]);
    }
}
