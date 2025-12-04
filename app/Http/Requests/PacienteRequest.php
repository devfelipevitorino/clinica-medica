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
                'digits:11',
                Rule::unique('pacientes', 'cpf')->ignore($id),
            ],

            'email' => 'required|email|max:255',
            'telefone' => 'required|digits:11',
            'data_nascimento' => 'nullable|date|before_or_equal:today',

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

            'required' => 'Campo obrigatório',

            'nome.required' => 'O nome é obrigatório.',
            'nome.max'      => 'O nome não pode ter mais de 255 caracteres.',

            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.digits'     => 'O CPF deve ter exatamente 11 números (Sem pontuação).',
            'cpf.unique'   => 'Este CPF já está cadastrado.',

            'email.email' => 'O email informado não é válido.',
            'email.max'   => 'O email não pode ter mais de 255 caracteres.',
            'email.required'   => 'O email é obrigatório.',

            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.digits' => 'O telefone deve conter 11 números (DDD + número).',

            'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',
            'data_nascimento.before_or_equal' => 'A data de nascimento não é válida.',
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',

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
