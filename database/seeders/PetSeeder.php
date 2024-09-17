<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pets')->insert([
            [
                'name' => 'Max',
                'sex' => 'Macho',
                'color' => 'Negro',
                'pedigree' => 1,
                'customer_id' => 1,
                'specie_id' => 1,
                'birthdate' => Carbon::createFromDate(2018, 8, 20),
                'race' => 'Labrador Retriever',
                'image' => 'ruta/a/la/imagen_max.jpg',
            ],
            [
                'name' => 'Luna',
                'sex' => 'Hembra',
                'color' => 'Blanco',
                'pedigree' => 0,
                'customer_id' => 2,
                'specie_id' => 1,
                'birthdate' => Carbon::createFromDate(2020, 3, 10),
                'race' => 'Golden Retriever',
                'image' => 'ruta/a/la/imagen_luna.jpg',
            ],
            [
                'name' => 'Rocky',
                'sex' => 'Macho',
                'color' => 'Gris',
                'pedigree' => 1,
                'customer_id' => 3,
                'specie_id' => 1,
                'birthdate' => Carbon::createFromDate(2017, 11, 5),
                'race' => 'Pastor Alemán',
                'image' => 'ruta/a/la/imagen_rocky.jpg',
            ],
            [
                'name' => 'Coco',
                'sex' => 'Macho',
                'color' => 'Marrón',
                'pedigree' => 0,
                'customer_id' => 4,
                'specie_id' => 2,
                'birthdate' => Carbon::createFromDate(2019, 6, 25),
                'race' => 'Siamés',
                'image' => 'ruta/a/la/imagen_coco.jpg',
            ],
            [
                'name' => 'Mia',
                'sex' => 'Hembra',
                'color' => 'Atigrado',
                'pedigree' => 0,
                'customer_id' => 5,
                'specie_id' => 3,
                'birthdate' => Carbon::createFromDate(2020, 2, 15),
                'race' => 'Bengala',
                'image' => 'ruta/a/la/imagen_mia.jpg',
            ],
            [
                'name' => 'Simba',
                'sex' => 'Macho',
                'color' => 'Amarillo y blanco',
                'pedigree' => 0,
                'customer_id' => 6,
                'specie_id' => 3,
                'birthdate' => Carbon::createFromDate(2019, 9, 30),
                'race' => 'Siberiano',
                'image' => 'ruta/a/la/imagen_simba.jpg',
            ],
            [
                'name' => 'Lola',
                'sex' => 'Hembra',
                'color' => 'Blanco y negro',
                'pedigree' => 1,
                'customer_id' => 7,
                'specie_id' => 2,
                'birthdate' => Carbon::createFromDate(2018, 4, 12),
                'race' => 'Persa',
                'image' => 'ruta/a/la/imagen_lola.jpg',
            ],
            [
                'name' => 'Thor',
                'sex' => 'Macho',
                'color' => 'Gris y blanco',
                'pedigree' => 1,
                'customer_id' => 8,
                'specie_id' => 1,
                'birthdate' => Carbon::createFromDate(2021, 1, 7),
                'race' => 'Bulldog Francés',
                'image' => 'ruta/a/la/imagen_thor.jpg',
            ],
            [
                'name' => 'Nina',
                'sex' => 'Hembra',
                'color' => 'Tricolor',
                'pedigree' => 0,
                'customer_id' => 9,
                'specie_id' => 1,
                'birthdate' => Carbon::createFromDate(2017, 7, 22),
                'race' => 'Dálmata',
                'image' => 'ruta/a/la/imagen_nina.jpg',
            ],
            [
                'name' => 'Toby',
                'sex' => 'Macho',
                'color' => 'Negro y blanco',
                'pedigree' => 0,
                'customer_id' => 10,
                'specie_id' => 1,
                'birthdate' => Carbon::createFromDate(2020, 10, 3),
                'race' => 'Bichón Maltés',
                'image' => 'ruta/a/la/imagen_toby.jpg',
            ],
        ]);
    }
}
