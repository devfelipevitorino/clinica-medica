<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('paciente') ?? $this->route('id');

        return [
            'nome' => 'required|string|max:255',

            'cpf' => [
                'required',
                'string',
                'size:11',
                Rule::unique('pacientes', 'cpf')->ignore($id),
            ],

            'email' => 'nullable|email|max:255',
            'telefone' => 'nullable|string|size:11',
            'data_nascimento' => 'nullable|date',

            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:50',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|size:2',
            'cep' => 'nullable|string|min:8|max:9',
        ];
    }

    /**
     * Mensagens de erro personalizadas em português.
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.max'      => 'O nome não pode ter mais de 255 caracteres.',

            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.size'     => 'O CPF deve ter exatamente 11 números (Sem pontuação).',
            'cpf.unique'   => 'Este CPF já está cadastrado.',

            'email.email' => 'O email informado não é válido.',
            'email.max'   => 'O email não pode ter mais de 255 caracteres.',

            'telefone.size' => 'O telefone deve conter 11 números (DDD + número).',

            'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',

            'rua.max'    => 'A rua não pode ter mais de 255 caracteres.',
            'numero.max' => 'O número não pode ter mais de 50 caracteres.',
            'bairro.max' => 'O bairro não pode ter mais de 255 caracteres.',
            'cidade.max' => 'A cidade não pode ter mais de 255 caracteres.',
            'estado.size' => 'O estado deve conter exatamente 2 letras (ex: PB, SP, RJ).',

            'cep.min' => 'O CEP deve ter no mínimo 8 caracteres.',
            'cep.max' => 'O CEP deve ter no máximo 9 caracteres.',
        ];
    }
}
