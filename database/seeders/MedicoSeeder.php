<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicoSeeder extends Seeder
{
    public function run(): void
    {
        $medicos = [
            ['nome' => 'Dr. João Silva',        'crm' => '001', 'telefone' => '83999990001', 'email' => 'joao@clinica.com',     'especialidade_id' => 1],
            ['nome' => 'Dra. Maria Souza',      'crm' => '002', 'telefone' => '83999990002', 'email' => 'maria@clinica.com',    'especialidade_id' => 2],
            ['nome' => 'Dr. Pedro Lima',        'crm' => '003', 'telefone' => '83999990003', 'email' => 'pedro@clinica.com',    'especialidade_id' => 3],
            ['nome' => 'Dra. Ana Borges',       'crm' => '004', 'telefone' => '83999990004', 'email' => 'ana@clinica.com',      'especialidade_id' => 4],
            ['nome' => 'Dr. Felipe Duarte',     'crm' => '005', 'telefone' => '83999990005', 'email' => 'felipe@clinica.com',   'especialidade_id' => 5],
            ['nome' => 'Dra. Camila Vieira',    'crm' => '006', 'telefone' => '83999990006', 'email' => 'camila@clinica.com',   'especialidade_id' => 6],
            ['nome' => 'Dr. Vinícius Azevedo',  'crm' => '007', 'telefone' => '83999990007', 'email' => 'vinicius@clinica.com', 'especialidade_id' => 7],
            ['nome' => 'Dra. Larissa Pontes',   'crm' => '008', 'telefone' => '83999990008', 'email' => 'larissa@clinica.com',  'especialidade_id' => 8],
            ['nome' => 'Dr. Rafael Mendes',     'crm' => '009', 'telefone' => '83999990009', 'email' => 'rafael@clinica.com',   'especialidade_id' => 9],
            ['nome' => 'Dra. Carolina Peixoto', 'crm' => '010', 'telefone' => '83999990010', 'email' => 'carolina@clinica.com', 'especialidade_id' => 10],
        ];


        foreach ($medicos as $medico) {
            Medico::create($medico);
        }
    }
}
