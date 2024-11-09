<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table("categories")->insert([
            [
                'name' => 'Medicamentos',
                'description' => 'Medicamentos para el tratamiento de diversas enfermedades y condiciones en animales.'
            ],
            [
                'name' => 'Alimentos',
                'description' => 'Alimentos balanceados para perros, gatos y otros animales domésticos.'
            ],
            [
                'name' => 'Accesorios',
                'description' => 'Accesorios para mascotas como correas, camas, juguetes, etc.'
            ],
            [
                'name' => 'Higiene',
                'description' => 'Productos para el cuidado y limpieza de tus mascotas, como champús y toallitas.'
            ],
        ]);
    }
}
