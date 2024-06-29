<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JuchuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('juchus')->insert([

            [
                'kyakusaki_id'=> 1,
                'bunbougu_id' => 21,
                'kosu' => 5,
                'joutai' => 0,
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],

            [
                'kyakusaki_id'=> 2,
                'bunbougu_id' => 22,
                'kosu' => 8,
                'joutai' => 0,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
        ]);
    }
}
