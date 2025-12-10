<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;
use App\Models\Medico;

class EnderecoSeeder extends Seeder
{
    public function run(): void
    {
        $enderecos = [
            ['rua' => 'Av. Epitácio Pessoa', 'numero' => '123', 'bairro' => 'Tambaú', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58039000'],
            ['rua' => 'Rua das Palmeiras', 'numero' => '45', 'bairro' => 'Manaíra', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58038000'],
            ['rua' => 'Av. Cruz das Armas', 'numero' => '999', 'bairro' => 'Cruz das Armas', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58085000'],
            ['rua' => 'Rua São José', 'numero' => '82', 'bairro' => 'Centro', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58010000'],
            ['rua' => 'Rua Oscar França', 'numero' => '210', 'bairro' => 'Torre', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58040000'],
            ['rua' => 'Av. Josefa Taveira', 'numero' => '400', 'bairro' => 'Mangabeira', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58055000'],
            ['rua' => 'Rua Afonso Pena', 'numero' => '120', 'bairro' => 'Jaguaribe', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58015000'],
            ['rua' => 'Rua da Mata', 'numero' => '78', 'bairro' => 'Bessa', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58035000'],
            ['rua' => 'Av. Vasco da Gama', 'numero' => '300', 'bairro' => 'Estados', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58030000'],
            ['rua' => 'Rua Dom Pedro II', 'numero' => '600', 'bairro' => 'Centro', 'cidade' => 'João Pessoa', 'estado' => 'PB', 'cep' => '58011000'],
        ];

        foreach (Paciente::all() as $i => $paciente) {
            $paciente->endereco()->create(
                $enderecos[$i % count($enderecos)]
            );
        }

        foreach (Medico::all() as $i => $medico) {
            $medico->endereco()->create(
                $enderecos[$i % count($enderecos)]
            );
        }
    }
}
