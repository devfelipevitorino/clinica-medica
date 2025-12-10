<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consulta;

class ConsultaSeeder extends Seeder
{
    public function run(): void
    {
        $consultas = [
            ['paciente_id' => 1, 'medico_id' => 1, 'data' => '2025-01-12', 'hora' => '08:00', 'observacoes' => 'Rotina', 'status' => 'espera'],
            ['paciente_id' => 2, 'medico_id' => 2, 'data' => '2025-01-12', 'hora' => '08:30', 'observacoes' => 'Alergia', 'status' => 'espera'],
            ['paciente_id' => 3, 'medico_id' => 3, 'data' => '2025-01-12', 'hora' => '09:00', 'observacoes' => 'Consulta infantil', 'status' => 'em_atendimento'],
            ['paciente_id' => 4, 'medico_id' => 4, 'data' => '2025-01-12', 'hora' => '09:30', 'observacoes' => 'Dor no joelho', 'status' => 'espera'],
            ['paciente_id' => 5, 'medico_id' => 5, 'data' => '2025-01-12', 'hora' => '10:00', 'observacoes' => 'Enxaqueca', 'status' => 'espera'],
            ['paciente_id' => 6, 'medico_id' => 6, 'data' => '2025-01-12', 'hora' => '10:30', 'observacoes' => 'Dor abdominal', 'status' => 'finalizado'],
            ['paciente_id' => 7, 'medico_id' => 7, 'data' => '2025-01-12', 'hora' => '11:00', 'observacoes' => 'Rotina anual', 'status' => 'espera'],
            ['paciente_id' => 8, 'medico_id' => 8, 'data' => '2025-01-12', 'hora' => '11:30', 'observacoes' => 'Exame hormonal', 'status' => 'espera'],
            ['paciente_id' => 9, 'medico_id' => 9, 'data' => '2025-01-12', 'hora' => '14:00', 'observacoes' => 'Dor lombar', 'status' => 'em_atendimento'],
            ['paciente_id' => 10, 'medico_id' => 10, 'data' => '2025-01-12', 'hora' => '14:30', 'observacoes' => 'Avaliação oftalmológica', 'status' => 'espera'],
        ];

        foreach ($consultas as $consulta) {
            Consulta::create($consulta);
        }
    }
}
