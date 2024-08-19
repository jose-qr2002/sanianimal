<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoriaClinicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('historias_clinicas')->insert([
            ['numero' => 1001, 'motivo' => 'Consulta rutinaria', 'mucosas' => 'Normales', 'anamnesis' => 'Sin antecedentes', 'diagnostico' => 'Salud general buena', 'tratamiento' => 'Ninguno', 'precio' => 30.00, 'mascota_id' => 1, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1002, 'motivo' => 'Problemas digestivos', 'mucosas' => 'Pálidas', 'anamnesis' => 'Dieta reciente cambio', 'diagnostico' => 'Gastritis leve', 'tratamiento' => 'Medicamento antiácido', 'precio' => 45.00, 'mascota_id' => 2, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1003, 'motivo' => 'Vacunación anual', 'mucosas' => 'Normales', 'anamnesis' => 'Vacunas al día', 'diagnostico' => 'Vacunación completa', 'tratamiento' => 'Vacuna aplicada', 'precio' => 50.00, 'mascota_id' => 3, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1004, 'motivo' => 'Chequeo dental', 'mucosas' => 'Levemente inflamadas', 'anamnesis' => 'Problemas dentales previos', 'diagnostico' => 'Cálculo dental', 'tratamiento' => 'Limpieza dental', 'precio' => 75.00, 'mascota_id' => 4, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1005, 'motivo' => 'Herida en la pata', 'mucosas' => 'Normales', 'anamnesis' => 'Accidente reciente', 'diagnostico' => 'Herida en la pata izquierda', 'tratamiento' => 'Antibióticos y vendaje', 'precio' => 60.00, 'mascota_id' => 5, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1006, 'motivo' => 'Problemas respiratorios', 'mucosas' => 'Cianóticas', 'anamnesis' => 'Exposición a humo', 'diagnostico' => 'Bronquitis', 'tratamiento' => 'Inhalador y descanso', 'precio' => 80.00, 'mascota_id' => 6, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1007, 'motivo' => 'Control de peso', 'mucosas' => 'Normales', 'anamnesis' => 'Sobrepeso', 'diagnostico' => 'Obesidad leve', 'tratamiento' => 'Dieta controlada y ejercicio', 'precio' => 40.00, 'mascota_id' => 7, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1008, 'motivo' => 'Infección urinaria', 'mucosas' => 'Normales', 'anamnesis' => 'Frecuencia urinaria alta', 'diagnostico' => 'Cistitis', 'tratamiento' => 'Antibióticos', 'precio' => 55.00, 'mascota_id' => 8, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1009, 'motivo' => 'Chequeo general', 'mucosas' => 'Normales', 'anamnesis' => 'Ninguna', 'diagnostico' => 'Salud general óptima', 'tratamiento' => 'Ninguno', 'precio' => 25.00, 'mascota_id' => 9, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1010, 'motivo' => 'Diarrea persistente', 'mucosas' => 'Deshidratadas', 'anamnesis' => 'Cambio en la dieta', 'diagnostico' => 'Gastroenteritis', 'tratamiento' => 'Suero y dieta blanda', 'precio' => 70.00, 'mascota_id' => 10, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1011, 'motivo' => 'Examen de sangre', 'mucosas' => 'Normales', 'anamnesis' => 'Chequeo rutinario', 'diagnostico' => 'Todos los parámetros normales', 'tratamiento' => 'Ninguno', 'precio' => 90.00, 'mascota_id' => 7, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1012, 'motivo' => 'Problema ocular', 'mucosas' => 'Normales', 'anamnesis' => 'Enrojecimiento ocular', 'diagnostico' => 'Conjuntivitis', 'tratamiento' => 'Gotas oculares', 'precio' => 65.00, 'mascota_id' => 1, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1013, 'motivo' => 'Dolor abdominal', 'mucosas' => 'Pálidas', 'anamnesis' => 'Dolor reciente', 'diagnostico' => 'Distensión abdominal', 'tratamiento' => 'Medicamentos y dieta controlada', 'precio' => 85.00, 'mascota_id' => 4, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1014, 'motivo' => 'Corte en la pata', 'mucosas' => 'Normales', 'anamnesis' => 'Accidente doméstico', 'diagnostico' => 'Corte superficial', 'tratamiento' => 'Limpieza y puntos', 'precio' => 50.00, 'mascota_id' => 3, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['numero' => 1015, 'motivo' => 'Fiebre alta', 'mucosas' => 'Rojizas', 'anamnesis' => 'Síntomas de fiebre', 'diagnostico' => 'Fiebre sin causa aparente', 'tratamiento' => 'Medicamentos antipiréticos', 'precio' => 95.00, 'mascota_id' => 2, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
