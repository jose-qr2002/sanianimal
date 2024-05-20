<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mascotas')->insert([
            'nombre' => 'Buddy',
            'sexo' => 'Macho',
            'color' => 'Marrón y blanco',
            'pedigree' => 1,
            'cliente_id' => 1, // ID de cliente existente
            'especie_id' => 1, // ID de especie existente
            'fecha_nacimiento' => Carbon::createFromDate(2019, 5, 15),
            'raza' => 'Labrador Retriever',
            'imagen' => 'ruta/a/la/imagen.jpg',
        ]);
    }
}
