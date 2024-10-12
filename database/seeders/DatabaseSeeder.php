<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            FileSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ItemSeeder::class,
            PopularSeeder::class,
            BannerSeeder::class,
            // Tambahkan seeder lainnya di sini jika diperlukan
        ]);
    }
}
