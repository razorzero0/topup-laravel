<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('populars')->insert([
            [
                'id' => 1,
                'product_id' => 1,
                'created_at' => '2024-10-12 07:05:38',
                'updated_at' => '2024-10-12 07:05:38',
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'created_at' => '2024-10-12 07:05:43',
                'updated_at' => '2024-10-12 07:05:43',
            ],
            [
                'id' => 3,
                'product_id' => 3,
                'created_at' => '2024-10-12 07:05:48',
                'updated_at' => '2024-10-12 07:05:48',
            ],
            [
                'id' => 4,
                'product_id' => 4,
                'created_at' => '2024-10-12 07:25:55',
                'updated_at' => '2024-10-12 07:25:55',
            ],
        ]);
    }
}
