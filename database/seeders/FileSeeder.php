<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('files')->insert([
            [
                'id' => 1,
                'name' => 'kantong diamond ml',
                'image' => 'images/1728719497.webp',
                'created_at' => '2024-10-11 15:33:57',
                'updated_at' => '2024-10-12 11:20:09',
            ],
            [
                'id' => 2,
                'name' => 'banner ff',
                'image' => 'images/1728719511.png',
                'created_at' => '2024-10-12 07:51:51',
                'updated_at' => '2024-10-12 07:51:51',
            ],
            [
                'id' => 3,
                'name' => 'banner ml',
                'image' => 'images/1728719521.png',
                'created_at' => '2024-10-12 07:52:01',
                'updated_at' => '2024-10-12 07:52:01',
            ],
            [
                'id' => 4,
                'name' => 'banner pubg',
                'image' => 'images/1728719536.png',
                'created_at' => '2024-10-12 07:52:16',
                'updated_at' => '2024-10-12 07:52:16',
            ],
            [
                'id' => 5,
                'name' => '1 diamond ml',
                'image' => 'images/1728732042.webp',
                'created_at' => '2024-10-12 11:20:42',
                'updated_at' => '2024-10-12 11:20:42',
            ],
            [
                'id' => 6,
                'name' => 'banyak diamond ml',
                'image' => 'images/1728732065.webp',
                'created_at' => '2024-10-12 11:21:05',
                'updated_at' => '2024-10-12 11:21:05',
            ],
            [
                'id' => 7,
                'name' => 'diamond ff',
                'image' => 'images/1728732084.webp',
                'created_at' => '2024-10-12 11:21:24',
                'updated_at' => '2024-10-12 11:21:24',
            ],
            [
                'id' => 9,
                'name' => '1 token hok',
                'image' => 'images/1728732114.png',
                'created_at' => '2024-10-12 11:21:54',
                'updated_at' => '2024-10-12 11:21:54',
            ],
            [
                'id' => 10,
                'name' => 'beberapa token hok',
                'image' => 'images/1728732146.png',
                'created_at' => '2024-10-12 11:22:26',
                'updated_at' => '2024-10-12 11:22:26',
            ],
            [
                'id' => 11,
                'name' => 'kanyong token hok',
                'image' => 'images/1728732163.png',
                'created_at' => '2024-10-12 11:22:43',
                'updated_at' => '2024-10-12 11:22:43',
            ],
            [
                'id' => 12,
                'name' => 'indosat',
                'image' => 'images/1728732178.png',
                'created_at' => '2024-10-12 11:22:58',
                'updated_at' => '2024-10-12 11:22:58',
            ],
            [
                'id' => 13,
                'name' => 'ml weekly pass',
                'image' => 'images/1728732591.webp',
                'created_at' => '2024-10-12 11:29:51',
                'updated_at' => '2024-10-12 11:29:51',
            ],
            [
                'id' => 14,
                'name' => 'cek id',
                'image' => 'images/1728732896.png',
                'created_at' => '2024-10-12 11:34:56',
                'updated_at' => '2024-10-12 11:34:56',
            ],
        ]);
    }
}
