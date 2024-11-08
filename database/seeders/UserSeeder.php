<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'guest']);

        $guest = User::create([
            'id' => 0,
            'name' => 'guest',
            'email' => 'guest@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('0601012000'),
            'remember_token' => Str::random(10),
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'muhainun059@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('0601012000'),
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'muhainun058@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Muhainun058'),
            'remember_token' => Str::random(10),
        ]);

        // Register Role  & Permission to Users
        $guest->assignRole('guest');
        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
