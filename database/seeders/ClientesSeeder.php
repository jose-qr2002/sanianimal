<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nombre' => 'Ana',
                'apellido' => 'García',
                'n_documento' => '1234567801',
                'sexo' => 'F',
                'email' => 'ana.garcia@example.com',
                'direccion' => 'Calle Mayor 123',
                'fecha_nacimiento' => '1980-05-12',
                'imagen' => null,
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Martínez',
                'n_documento' => '1234567802',
                'sexo' => 'M',
                'email' => 'carlos.martinez@example.com',
                'direccion' => 'Avenida Libertador 456',
                'fecha_nacimiento' => '1993-10-20',
                'imagen' => null,
            ],
            [
                'nombre' => 'Laura',
                'apellido' => 'López',
                'n_documento' => '1234567803',
                'sexo' => 'F',
                'email' => 'laura.lopez@example.com',
                'direccion' => 'Calle Real 789',
                'fecha_nacimiento' => '1975-02-28',
                'imagen' => null,
            ],
            [
                'nombre' => 'Javier',
                'apellido' => 'Díaz',
                'n_documento' => '1234567804',
                'sexo' => 'M',
                'email' => 'javier.diaz@example.com',
                'direccion' => 'Carrera 10 #23-45',
                'fecha_nacimiento' => '1987-08-18',
                'imagen' => null,
            ],
            [
                'nombre' => 'María',
                'apellido' => 'Gómez',
                'n_documento' => '1234567805',
                'sexo' => 'F',
                'email' => 'maria.gomez@example.com',
                'direccion' => 'Calle 70 #45-67',
                'fecha_nacimiento' => '1990-11-30',
                'imagen' => null,
            ],
            [
                'nombre' => 'Alejandro',
                'apellido' => 'Hernández',
                'n_documento' => '1234567806',
                'sexo' => 'M',
                'email' => 'alejandro.hernandez@example.com',
                'direccion' => 'Avenida Circunvalar 80-90',
                'fecha_nacimiento' => '1983-04-25',
                'imagen' => null,
            ],
            [
                'nombre' => 'Carmen',
                'apellido' => 'Martínez',
                'n_documento' => '1234567807',
                'sexo' => 'F',
                'email' => 'carmen.martinez@example.com',
                'direccion' => 'Calle 50 #12-34',
                'fecha_nacimiento' => '1970-07-15',
                'imagen' => null,
            ],
            [
                'nombre' => 'Diego',
                'apellido' => 'Alvarez',
                'n_documento' => '1234567808',
                'sexo' => 'M',
                'email' => 'diego.alvarez@example.com',
                'direccion' => 'Carrera 30 #56-78',
                'fecha_nacimiento' => '1988-12-05',
                'imagen' => null,
            ],
            [
                'nombre' => 'Sofía',
                'apellido' => 'Romero',
                'n_documento' => '1234567809',
                'sexo' => 'F',
                'email' => 'sofia.romero@example.com',
                'direccion' => 'Calle 80 #34-56',
                'fecha_nacimiento' => '1995-03-20',
                'imagen' => null,
            ],
            [
                'nombre' => 'Miguel',
                'apellido' => 'Pérez',
                'n_documento' => '1234567810',
                'sexo' => 'M',
                'email' => 'miguel.perez@example.com',
                'direccion' => 'Carrera 5 #67-89',
                'fecha_nacimiento' => '1982-09-10',
                'imagen' => null,
            ],
        ]);
    }
}
