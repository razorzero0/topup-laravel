<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'id' => 1,
                'image' => 2,
                'created_at' => '2024-10-12 07:52:38',
                'updated_at' => '2024-10-12 07:52:38',
            ],
            [
                'id' => 2,
                'image' => 3,
                'created_at' => '2024-10-12 07:52:43',
                'updated_at' => '2024-10-12 07:52:43',
            ],
            [
                'id' => 3,
                'image' => 4,
                'created_at' => '2024-10-12 07:52:49',
                'updated_at' => '2024-10-12 07:52:49',
            ],
        ]);
    }
}
