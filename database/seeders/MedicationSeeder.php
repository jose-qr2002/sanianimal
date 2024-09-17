<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('medications')->insert([
                'name' => 'Medicamento ' . $i,
                'brand' => 'Marca ' . $i,
                'description' => 'Descripción del medicamento ' . $i,
                'stock' => rand(10, 100), // Stock aleatorio entre 10 y 100
                'price' => rand(10, 1000) / 10, // Precio aleatorio con decimales
            ]);
        }
    }
}
