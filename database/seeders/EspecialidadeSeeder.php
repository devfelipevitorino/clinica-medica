<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidade;

class EspecialidadeSeeder extends Seeder
{
    public function run(): void
    {
        $especialidades = [
            ['nome' => 'Cardiologia', 'descricao' => 'Tratamento de doenças do coração'],
            ['nome' => 'Dermatologia', 'descricao' => 'Especialidade da pele'],
            ['nome' => 'Pediatria', 'descricao' => 'Cuidado da saúde infantil'],
            ['nome' => 'Ortopedia', 'descricao' => 'Trata lesões ósseas e musculares'],
            ['nome' => 'Neurologia', 'descricao' => 'Sistema nervoso'],
            ['nome' => 'Gastroenterologia', 'descricao' => 'Sistema digestivo'],
            ['nome' => 'Ginecologia', 'descricao' => 'Saúde reprodutiva feminina'],
            ['nome' => 'Endocrinologia', 'descricao' => 'Distúrbios hormonais'],
            ['nome' => 'Urologia', 'descricao' => 'Trato urinário e reprodutor masculino'],
            ['nome' => 'Oftalmologia', 'descricao' => 'Saúde dos olhos'],
        ];

        foreach ($especialidades as $esp) {
            Especialidade::create($esp);
        }
    }
}
