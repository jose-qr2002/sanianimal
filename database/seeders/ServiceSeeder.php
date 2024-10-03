<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Consultation',
                'description' => 'General health consultation',
                'price' => 50.00
            ],
            [
                'name' => 'Vaccination',
                'description' => 'Annual vaccination service',
                'price' => 20.00
            ],
            [
                'name' => 'Surgery',
                'description' => 'Minor surgeries',
                'price' => 150.00
            ]
        ]);
    }
}
