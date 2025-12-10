<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        $pacientes = [
            ['nome' => 'Felipe Alves', 'cpf' => '11111111111', 'data_nascimento' => '1995-01-10', 'telefone' => '83991000001', 'email' => 'felipe@gmail.com'],
            ['nome' => 'Mariana Castro', 'cpf' => '22222222222', 'data_nascimento' => '1988-03-22', 'telefone' => '83991000002', 'email' => 'mariana@gmail.com'],
            ['nome' => 'Carlos Eduardo', 'cpf' => '33333333333', 'data_nascimento' => '2001-07-18', 'telefone' => '83991000003', 'email' => 'carlos@gmail.com'],
            ['nome' => 'Ana Paula', 'cpf' => '44444444444', 'data_nascimento' => '1979-12-05', 'telefone' => '83991000004', 'email' => 'ana@yahoo.com'],
            ['nome' => 'João Felipe', 'cpf' => '55555555555', 'data_nascimento' => '1985-11-11', 'telefone' => '83991000005', 'email' => 'joao@yahoo.com'],
            ['nome' => 'Clara Beatriz', 'cpf' => '66666666666', 'data_nascimento' => '1999-08-27', 'telefone' => '83991000006', 'email' => 'clara@gmail.com'],
            ['nome' => 'Lucas Pereira', 'cpf' => '77777777777', 'data_nascimento' => '1992-04-04', 'telefone' => '83991000007', 'email' => 'lucas@gmail.com'],
            ['nome' => 'Juliana Ramos', 'cpf' => '88888888888', 'data_nascimento' => '2000-09-09', 'telefone' => '83991000008', 'email' => 'juliana@gmail.com'],
            ['nome' => 'Paulo Ricardo', 'cpf' => '99999999999', 'data_nascimento' => '1975-06-30', 'telefone' => '83991000009', 'email' => 'paulo@gmail.com'],
            ['nome' => 'Fernanda Lima', 'cpf' => '10101010101', 'data_nascimento' => '1993-02-14', 'telefone' => '83991000010', 'email' => 'fernanda@gmail.com'],
        ];

        foreach ($pacientes as $paciente) {
            Paciente::create($paciente);
        }
    }
}
