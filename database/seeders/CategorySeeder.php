<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Games',
                'created_at' => '2024-10-11 15:30:18',
                'updated_at' => '2024-10-11 15:30:18',
            ],
            [
                'id' => 3,
                'name' => 'E-Money',
                'created_at' => '2024-10-12 07:14:19',
                'updated_at' => '2024-10-12 07:14:19',
            ],
            [
                'id' => 4,
                'name' => 'Pulsa',
                'created_at' => '2024-10-12 07:15:19',
                'updated_at' => '2024-10-12 07:15:19',
            ],
        ]);
    }
}
