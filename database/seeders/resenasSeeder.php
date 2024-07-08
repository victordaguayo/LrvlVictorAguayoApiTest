<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class resenasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('resenas')->insert([
            'idComment'=>1,
            'comment'=>"I love it <3",
            'stars'=>5
            ]);
        DB::table('resenas')->insert([
            'idComment'=>2,
            'comment'=>"Good movie",
            'stars'=>4
        ]);
    }
}
