<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class BunruiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bunruis')->insert([

            [   'str' => '鉛筆',
                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => null,
            ],

            [   'str' => 'ボールペン',
                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => null,
            ],

            [   'str' => '消しゴム',
                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => null,
            ],
        ]);
    }
}
