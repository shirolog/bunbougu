<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KyakusakiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kyakusakis')->insert([

            [
                'name' => 'A株式会社',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],

            [
                'name' => 'B株式会社',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],

            [
                'name' => 'C株式会社',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
        ]);
    }
}
