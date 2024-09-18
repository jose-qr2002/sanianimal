<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'clinical_history_id' => 1,
                'number' => 1,
                'reason' => 'Consulta rutinaria',
                'mucous' => 'Normales',
                'anamnesis' => 'Sin antecedentes',
                'diagnosis' => 'Salud general buena',
                'treatment' => 'Ninguno',
                'price' => 30.00,
                'date' => '2024-07-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinical_history_id' => 2,
                'number' => 1,
                'reason' => 'Problemas digestivos',
                'mucous' => 'Pálidas',
                'anamnesis' => 'Dieta reciente cambio',
                'diagnosis' => 'Gastritis leve',
                'treatment' => 'Medicamento antiácido',
                'price' => 45.00,
                'date' => '2024-07-02',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinical_history_id' => 3,
                'number' => 1,
                'reason' => 'Vacunación anual',
                'mucous' => 'Normales',
                'anamnesis' => 'Vacunas al día',
                'diagnosis' => 'Vacunación completa',
                'treatment' => 'Vacuna aplicada',
                'price' => 50.00,
                'date' => '2024-07-04',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinical_history_id' => 4,
                'number' => 1,
                'reason' => 'Chequeo dental',
                'mucous' => 'Levemente inflamadas',
                'anamnesis' => 'Problemas dentales previos',
                'diagnosis' => 'Cálculo dental',
                'treatment' => 'Limpieza dental',
                'price' => 75.00,
                'date' => '2024-07-09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinical_history_id' => 5,
                'number' => 1,
                'reason' => 'Herida en la pata',
                'mucous' => 'Normales',
                'anamnesis' => 'Accidente reciente',
                'diagnosis' => 'Herida en la pata izquierda',
                'treatment' => 'Antibióticos y vendaje',
                'price' => 60.00,
                'date' => '2024-07-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinical_history_id' => 6,
                'number' => 1,
                'reason' => 'Problemas respiratorios',
                'mucous' => 'Cianóticas',
                'anamnesis' => 'Exposición a humo',
                'diagnosis' => 'Bronquitis',
                'treatment' => 'Inhalador y descanso',
                'price' => 80.00,
                'date' => '2024-07-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinical_history_id' => 7,
                'number' => 1,
                'reason' => 'Control de peso',
                'mucous' => 'Normales',
                'anamnesis' => 'Sobrepeso',
                'diagnosis' => 'Obesidad leve',
                'treatment' => 'Dieta controlada y ejercicio',
                'price' => 40.00,
                'date' => '2024-07-13',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinical_history_id' => 8,
                'number' => 1,
                'reason' => 'Infección urinaria',
                'mucous' => 'Normales',
                'anamnesis' => 'Frecuencia urinaria alta',
                'diagnosis' => 'Cistitis',
                'treatment' => 'Antibióticos',
                'price' => 55.00,
                'date' => '2024-07-16',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinical_history_id' => 9,
                'number' => 1,
                'reason' => 'Chequeo general',
                'mucous' => 'Normales',
                'anamnesis' => 'Ninguna',
                'diagnosis' => 'Salud general óptima',
                'treatment' => 'Ninguno',
                'price' => 25.00,
                'date' => '2024-07-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinical_history_id' => 10,
                'number' => 1,
                'reason' => 'Diarrea persistente',
                'mucous' => 'Deshidratadas',
                'anamnesis' => 'Cambio en la dieta',
                'diagnosis' => 'Gastroenteritis',
                'treatment' => 'Suero y dieta blanda',
                'price' => 70.00,
                'date' => '2024-07-22',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        DB::table('visits')->insert($data);
        
    }
}
