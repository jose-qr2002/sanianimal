<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'ruc' => '20123456789',
                'name' => 'Proveedores del Norte',
                'phone' => '987654321',
                'address' => 'Av. Principal 123, Lima'
            ],
            [
                'ruc' => '20234567890',
                'name' => 'Distribuidora Andina',
                'phone' => '912345678',
                'address' => 'Calle Comercio 45, Cusco'
            ],
            [
                'ruc' => '20345678901',
                'name' => 'Importadora Global',
                'phone' => '965432187',
                'address' => 'Jr. Industrial 89, Arequipa'
            ],
            [
                'ruc' => '20456789012',
                'name' => 'Suministros Express',
                'phone' => '934567812',
                'address' => 'Av. Central 456, Trujillo'
            ],
            [
                'ruc' => '20567890123',
                'name' => 'Equipos y Servicios S.A.',
                'phone' => '912876543',
                'address' => 'Calle Perú 567, Piura'
            ],
            [
                'ruc' => '20678901234',
                'name' => 'Comercializadora de Productos',
                'phone' => '987612345',
                'address' => 'Av. Libertad 123, Chiclayo'
            ],
            [
                'ruc' => '20789012345',
                'name' => 'Soluciones Industriales',
                'phone' => '923456789',
                'address' => 'Av. Marina 89, Lima'
            ],
            [
                'ruc' => '20890123456',
                'name' => 'Logística Integral',
                'phone' => '912345678',
                'address' => 'Calle Progreso 234, Tacna'
            ],
            [
                'ruc' => '20901234567',
                'name' => 'Productos del Sur',
                'phone' => '934567890',
                'address' => 'Jr. San Juan 345, Puno'
            ],
            [
                'ruc' => '21012345678',
                'name' => 'Distribuciones del Centro',
                'phone' => '987654321',
                'address' => 'Calle Comercio 234, Huancayo'
            ]
       ]);
    
    }
}
