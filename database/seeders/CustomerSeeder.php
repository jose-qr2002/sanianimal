<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Ana',
                'lastname' => 'García',
                'n_document' => '1234567801',
                'sex' => 'F',
                'email' => 'ana.garcia@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Calle Mayor 123',
                'birthdate' => '1980-05-12',
                'image' => null,
            ],
            [
                'name' => 'Carlos',
                'lastname' => 'Martínez',
                'n_document' => '1234567802',
                'sex' => 'M',
                'email' => 'carlos.martinez@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Avenida Libertador 456',
                'birthdate' => '1993-10-20',
                'image' => null,
            ],
            [
                'name' => 'Laura',
                'lastname' => 'López',
                'n_document' => '1234567803',
                'sex' => 'F',
                'email' => 'laura.lopez@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Calle Real 789',
                'birthdate' => '1975-02-28',
                'image' => null,
            ],
            [
                'name' => 'Javier',
                'lastname' => 'Díaz',
                'n_document' => '1234567804',
                'sex' => 'M',
                'email' => 'javier.diaz@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Carrera 10 #23-45',
                'birthdate' => '1987-08-18',
                'image' => null,
            ],
            [
                'name' => 'María',
                'lastname' => 'Gómez',
                'n_document' => '1234567805',
                'sex' => 'F',
                'email' => 'maria.gomez@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Calle 70 #45-67',
                'birthdate' => '1990-11-30',
                'image' => null,
            ],
            [
                'name' => 'Alejandro',
                'lastname' => 'Hernández',
                'n_document' => '1234567806',
                'sex' => 'M',
                'email' => 'alejandro.hernandez@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Avenida Circunvalar 80-90',
                'birthdate' => '1983-04-25',
                'image' => null,
            ],
            [
                'name' => 'Carmen',
                'lastname' => 'Martínez',
                'n_document' => '1234567807',
                'sex' => 'F',
                'email' => 'carmen.martinez@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Calle 50 #12-34',
                'birthdate' => '1970-07-15',
                'image' => null,
            ],
            [
                'name' => 'Diego',
                'lastname' => 'Alvarez',
                'n_document' => '1234567808',
                'sex' => 'M',
                'email' => 'diego.alvarez@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Carrera 30 #56-78',
                'birthdate' => '1988-12-05',
                'image' => null,
            ],
            [
                'name' => 'Sofía',
                'lastname' => 'Romero',
                'n_document' => '1234567809',
                'sex' => 'F',
                'email' => 'sofia.romero@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Calle 80 #34-56',
                'birthdate' => '1995-03-20',
                'image' => null,
            ],
            [
                'name' => 'Miguel',
                'lastname' => 'Pérez',
                'n_document' => '1234567810',
                'sex' => 'M',
                'email' => 'miguel.perez@example.com',
                'phone' =>  rand(900000000, 999999999),
                'address' => 'Carrera 5 #67-89',
                'birthdate' => '1982-09-10',
                'image' => null,
            ],
        ]);
        
    }
}
