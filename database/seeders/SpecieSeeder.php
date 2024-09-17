<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('species')->insert([
            'specie' => 'Perro'
        ]);
        DB::table('species')->insert([
            'specie' => 'Gato'
        ]);
        DB::table('species')->insert([
            'specie' => 'Conejo'
        ]);
    }
}
