<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class AppliedVaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applied_vaccines')->insert([
            [
                'date' => Date::now()->subDays(10),
                'time' => '09:00:00',
                'observation' => 'First dose administered.',
                'vaccine_id' => 1, // Asegúrate de que estos IDs existan en la tabla 'vaccines'
                'visit_id' => 1 // Asegúrate de que estos IDs existan en la tabla 'historia_clinica'
            ],
            [
                'date' => Date::now()->subDays(9),
                'time' => '10:30:00',
                'observation' => 'Patient reports no side effects.',
                'vaccine_id' => 2,
                'visit_id' => 1
            ],
            [
                'date' => Date::now()->subDays(8),
                'time' => '14:00:00',
                'observation' => 'Second dose administered.',
                'vaccine_id' => 3,
                'visit_id' => 3
            ],
            [
                'date' => Date::now()->subDays(7),
                'time' => '11:15:00',
                'observation' => 'Patient feeling well.',
                'vaccine_id' => 4,
                'visit_id' => 4
            ],
            [
                'date' => Date::now()->subDays(6),
                'time' => '08:45:00',
                'observation' => 'No adverse reactions.',
                'vaccine_id' => 5,
                'visit_id' => 5
            ],
            [
                'date' => Date::now()->subDays(5),
                'time' => '13:30:00',
                'observation' => 'Patient had slight fever.',
                'vaccine_id' => 6,
                'visit_id' => 6
            ],
            [
                'date' => Date::now()->subDays(4),
                'time' => '09:30:00',
                'observation' => 'Allergic reaction noted.',
                'vaccine_id' => 7,
                'visit_id' => 7
            ],
            [
                'date' => Date::now()->subDays(3),
                'time' => '12:00:00',
                'observation' => 'No issues reported.',
                'vaccine_id' => 8,
                'visit_id' => 8
            ],
            [
                'date' => Date::now()->subDays(2),
                'time' => '10:00:00',
                'observation' => 'Patient reports fatigue.',
                'vaccine_id' => 9,
                'visit_id' => 9
            ],
            [
                'date' => Date::now()->subDay(),
                'time' => '15:00:00',
                'observation' => 'Patient recovering well.',
                'vaccine_id' => 10,
                'visit_id' => 10
            ],
        ]);
    }
}
