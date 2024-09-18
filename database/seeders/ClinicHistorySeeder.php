<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinicHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['number' => 1000, 'pet_id' => 1, 'user_id' => 1],
            ['number' => 1001, 'pet_id' => 2, 'user_id' => 1],
            ['number' => 1002, 'pet_id' => 3, 'user_id' => 1],
            ['number' => 1003, 'pet_id' => 4, 'user_id' => 1],
            ['number' => 1004, 'pet_id' => 5, 'user_id' => 1],
            ['number' => 1005, 'pet_id' => 6, 'user_id' => 1],
            ['number' => 1006, 'pet_id' => 7, 'user_id' => 1],
            ['number' => 1007, 'pet_id' => 8, 'user_id' => 1],
            ['number' => 1008, 'pet_id' => 9, 'user_id' => 1],
            ['number' => 1009, 'pet_id' => 10, 'user_id' => 1],
        ];

        DB::table('clinical_histories')->insert($data);
    }
}
