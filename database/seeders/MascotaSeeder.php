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
            [
                'nombre' => 'Max',
                'sexo' => 'Macho',
                'color' => 'Negro',
                'pedigree' => 1,
                'cliente_id' => 1,
                'especie_id' => 1,
                'fecha_nacimiento' => Carbon::createFromDate(2018, 8, 20),
                'raza' => 'Labrador Retriever',
                'imagen' => 'ruta/a/la/imagen_max.jpg',
            ],
            [
                'nombre' => 'Luna',
                'sexo' => 'Hembra',
                'color' => 'Blanco',
                'pedigree' => 0,
                'cliente_id' => 2,
                'especie_id' => 1,
                'fecha_nacimiento' => Carbon::createFromDate(2020, 3, 10),
                'raza' => 'Golden Retriever',
                'imagen' => 'ruta/a/la/imagen_luna.jpg',
            ],
            [
                'nombre' => 'Rocky',
                'sexo' => 'Macho',
                'color' => 'Gris',
                'pedigree' => 1,
                'cliente_id' => 3,
                'especie_id' => 1,
                'fecha_nacimiento' => Carbon::createFromDate(2017, 11, 5),
                'raza' => 'Pastor Alemán',
                'imagen' => 'ruta/a/la/imagen_rocky.jpg',
            ],
            [
                'nombre' => 'Coco',
                'sexo' => 'Macho',
                'color' => 'Marrón',
                'pedigree' => 0,
                'cliente_id' => 4,
                'especie_id' => 2,
                'fecha_nacimiento' => Carbon::createFromDate(2019, 6, 25),
                'raza' => 'Siamés',
                'imagen' => 'ruta/a/la/imagen_coco.jpg',
            ],
            [
                'nombre' => 'Mia',
                'sexo' => 'Hembra',
                'color' => 'Atigrado',
                'pedigree' => 0,
                'cliente_id' => 5,
                'especie_id' => 3,
                'fecha_nacimiento' => Carbon::createFromDate(2020, 2, 15),
                'raza' => 'Bengala',
                'imagen' => 'ruta/a/la/imagen_mia.jpg',
            ],
            [
                'nombre' => 'Simba',
                'sexo' => 'Macho',
                'color' => 'Amarillo y blanco',
                'pedigree' => 0,
                'cliente_id' => 6,
                'especie_id' => 3,
                'fecha_nacimiento' => Carbon::createFromDate(2019, 9, 30),
                'raza' => 'Siberiano',
                'imagen' => 'ruta/a/la/imagen_simba.jpg',
            ],
            [
                'nombre' => 'Lola',
                'sexo' => 'Hembra',
                'color' => 'Blanco y negro',
                'pedigree' => 1,
                'cliente_id' => 7,
                'especie_id' => 2,
                'fecha_nacimiento' => Carbon::createFromDate(2018, 4, 12),
                'raza' => 'Persa',
                'imagen' => 'ruta/a/la/imagen_lola.jpg',
            ],
            [
                'nombre' => 'Thor',
                'sexo' => 'Macho',
                'color' => 'Gris y blanco',
                'pedigree' => 1,
                'cliente_id' => 8,
                'especie_id' => 1,
                'fecha_nacimiento' => Carbon::createFromDate(2021, 1, 7),
                'raza' => 'Bulldog Francés',
                'imagen' => 'ruta/a/la/imagen_thor.jpg',
            ],
            [
                'nombre' => 'Nina',
                'sexo' => 'Hembra',
                'color' => 'Tricolor',
                'pedigree' => 0,
                'cliente_id' => 9,
                'especie_id' => 1,
                'fecha_nacimiento' => Carbon::createFromDate(2017, 7, 22),
                'raza' => 'Dálmata',
                'imagen' => 'ruta/a/la/imagen_nina.jpg',
            ],
            [
                'nombre' => 'Toby',
                'sexo' => 'Macho',
                'color' => 'Negro y blanco',
                'pedigree' => 0,
                'cliente_id' => 10,
                'especie_id' => 1,
                'fecha_nacimiento' => Carbon::createFromDate(2020, 10, 3),
                'raza' => 'Bichón Maltés',
                'imagen' => 'ruta/a/la/imagen_toby.jpg',
            ],
        ]);
    }
}
