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
        // Generar 10 registros ficticios
        for ($i = 1; $i <= 10; $i++) {
            DB::table('clientes')->insert([
                'nombre' => 'Cliente ' . $i,
                'apellido' => 'Apellido ' . $i,
                'n_documento' => '12345678' . $i,
                'sexo' => 'M', // Puedes cambiarlo a 'F' para femenino
                'email' => 'cliente' . $i . '@example.com',
                'direccion' => 'Calle Falsa ' . $i,
                'fecha_nacimiento' => '1990-01-01', // Puedes ajustar la fecha
                'imagen' => null, // Dejamos el campo de imagen en blanco
            ]);
        }
    }
}
