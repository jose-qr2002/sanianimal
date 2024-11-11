<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("products")->insert([
            [
                'code' => '1234567890123',
                'name' => 'Antibiótico para Perros',
                'description' => 'Antibiótico de amplio espectro para tratar infecciones bacterianas.',
                'price' => 15.99,
                'stock' => 50,
                'brand' => 'VetMed',
                'measurement' => 'units',
                'image' => 'antibiotico_perros.jpg',
                'category_id' => 1
            ],
            [
                'code' => '2345678901234',
                'name' => 'Desparacitación Gatos',
                'description' => 'Medicamento para desparacitar gatos adultos y gatitos.',
                'price' => 10.99,
                'stock' => 80,
                'brand' => 'PetHealth',
                'measurement' => 'units',
                'image' => 'desparacitante_gatos.jpg',
                'category_id' => 1
            ],
            [
                'code' => '3456789012345',
                'name' => 'Pill Box para Mascotas',
                'description' => 'Contenedor para guardar las pastillas de tus mascotas.',
                'price' => 5.49,
                'stock' => 30,
                'brand' => 'PetCare',
                'measurement' => 'units',
                'image' => 'pill_box.jpg',
                'category_id' => 2
            ],
            [
                'code' => '4567890123456',
                'name' => 'Comida Seca para Perros',
                'description' => 'Alimento balanceado para perros de tamaño medio.',
                'price' => 20.00,
                'stock' => 100,
                'brand' => 'DoggoMeals',
                'measurement' => 'kilograms',
                'image' => 'comida_seca_perros.jpg',
                'category_id' => 2
            ],
            [
                'code' => '5678901234567',
                'name' => 'Pienso para Gatos',
                'description' => 'Alimento seco para gatos, rico en proteínas y vitaminas.',
                'price' => 18.50,
                'stock' => 60,
                'brand' => 'CatCuisine',
                'measurement' => 'kilograms',
                'image' => 'pienso_gatos.jpg',
                'category_id' => 2
            ],
            [
                'code' => '6789012345678',
                'name' => 'Collar Antipulgas para Perros',
                'description' => 'Collar para proteger a los perros contra pulgas y garrapatas.',
                'price' => 12.99,
                'stock' => 40,
                'brand' => 'SafePets',
                'measurement' => 'units',
                'image' => 'collar_antipulgas_perro.jpg',
                'category_id' => 3
            ],
            [
                'code' => '7890123456789',
                'name' => 'Juguete de Peluche para Perros',
                'description' => 'Juguete suave para que tu perro se divierta durante horas.',
                'price' => 7.99,
                'stock' => 150,
                'brand' => 'PlayPaws',
                'measurement' => 'units',
                'image' => 'juguete_peluche_perro.jpg',
                'category_id' => 3
            ],
            [
                'code' => '8901234567890',
                'name' => 'Shampoo para Gatos',
                'description' => 'Champú suave para la limpieza y cuidado del pelaje de los gatos.',
                'price' => 9.99,
                'stock' => 45,
                'brand' => 'CleanCat',
                'measurement' => 'units',
                'image' => 'shampoo_gatos.jpg',
                'category_id' => 4
            ],
            [
                'code' => '9012345678901',
                'name' => 'Toallitas Húmedas para Perros',
                'description' => 'Toallitas para limpiar a tu perro después de los paseos.',
                'price' => 6.49,
                'stock' => 75,
                'brand' => 'FreshPets',
                'measurement' => 'units',
                'image' => 'toallitas_perros.jpg',
                'category_id' => 4
            ],
            [
                'code' => '0123456789012',
                'name' => 'Alimento Húmedo para Gatos',
                'description' => 'Comida húmeda gourmet para gatos de todas las edades.',
                'price' => 3.49,
                'stock' => 200,
                'brand' => 'GourmetCat',
                'measurement' => 'grams',
                'image' => 'comida_humeda_gatos.jpg',
                'category_id' => 2
            ],
            [
                'code' => '1234567890124',
                'name' => 'Acondicionador para Mascotas',
                'description' => 'Acondicionador para mantener el pelaje de tu mascota suave y brillante.',
                'price' => 8.00,
                'stock' => 40,
                'brand' => 'PetCare',
                'measurement' => 'units',
                'image' => 'acondicionador_mascotas.jpg',
                'category_id' => 4
            ],
            [
                'code' => '2345678901235',
                'name' => 'Camita para Perros',
                'description' => 'Cama ortopédica para perros, especialmente diseñada para una buena postura.',
                'price' => 35.99,
                'stock' => 50,
                'brand' => 'PawComfort',
                'measurement' => 'units',
                'image' => 'camita_perro.jpg',
                'category_id' => 2
            ]
        ]);
    }
}
