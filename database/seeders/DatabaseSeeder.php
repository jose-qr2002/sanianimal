<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            SpecieSeeder::class,
            PetSeeder::class,
            MedicationSeeder::class,
            ClinicHistorySeeder::class,
            VaccineSeeder::class,
            AppliedVaccineSeeder::class,
        ]);

    }
}
