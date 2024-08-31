<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vaccines')->insert([
            [
                'vaccine' => 'Pfizer-BioNTech COVID-19',
                'stock' => 5000,
                'detail' => 'An mRNA vaccine for the COVID-19 virus.'
            ],
            [
                'vaccine' => 'Moderna COVID-19',
                'stock' => 4500,
                'detail' => 'An mRNA vaccine designed to prevent COVID-19.'
            ],
            [
                'vaccine' => 'Johnson & Johnson COVID-19',
                'stock' => 3000,
                'detail' => 'A single-dose adenoviral vector vaccine for COVID-19.'
            ],
            [
                'vaccine' => 'AstraZeneca COVID-19',
                'stock' => 3500,
                'detail' => 'An adenoviral vector vaccine developed for COVID-19.'
            ],
            [
                'vaccine' => 'Sinovac COVID-19',
                'stock' => 4000,
                'detail' => 'An inactivated virus vaccine for COVID-19.'
            ],
            [
                'vaccine' => 'Sinopharm COVID-19',
                'stock' => 4200,
                'detail' => 'An inactivated virus vaccine developed by the China National Biotec Group.'
            ],
            [
                'vaccine' => 'Hepatitis B',
                'stock' => 6000,
                'detail' => 'A vaccine to prevent hepatitis B infection.'
            ],
            [
                'vaccine' => 'MMR (Measles, Mumps, Rubella)',
                'stock' => 5500,
                'detail' => 'A vaccine to protect against measles, mumps, and rubella.'
            ],
            [
                'vaccine' => 'Tetanus, Diphtheria, Pertussis (Tdap)',
                'stock' => 5000,
                'detail' => 'A vaccine that protects against tetanus, diphtheria, and pertussis.'
            ],
            [
                'vaccine' => 'Polio',
                'stock' => 5200,
                'detail' => 'A vaccine to prevent poliomyelitis caused by poliovirus.'
            ],
        ]);
    }
}
