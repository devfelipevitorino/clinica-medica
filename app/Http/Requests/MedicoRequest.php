<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MedicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('medicos') ?? $this->route('id');

        return [
            'nome' => 'required|string|max:255',

            'crm' => [
                'required',
                'digits:6',
                Rule::unique('medicos', 'crm')->ignore($id),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('medicos', 'email')->ignore($id),
            ],

            'telefone' => 'required|digits:11',

            'especialidade_id' => 'required|exists:especialidades,id',

            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|size:2',
            'cep' => 'nullable|digits:8|max:9',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Campo obrigatório',

            'nome.required' => 'O nome é obrigatório.',
            'nome.max'      => 'O nome não pode ter mais de 255 caracteres.',

            'crm.required' => 'O crm é obrigatório.',
            'crm.digits'     => 'O crm deve ter no máximo 6 números (Sem pontuação).',

            'email.email' => 'O email informado não é válido.',
            'email.max'   => 'O email não pode ter mais de 255 caracteres.',
            'email.required'   => 'O email é obrigatório.',

            'telefone.digits' => 'O telefone deve conter 11 números (DDD + número).',
            'telefone.required' => 'O telefone é obrigatório.',

            'especialidade.required' => 'A especialidade é obrigatória.',

            'rua.max'    => 'A rua não pode ter mais de 255 caracteres.',
            'numero.max' => 'O número não pode ter mais de 50 caracteres.',
            'bairro.max' => 'O bairro não pode ter mais de 255 caracteres.',
            'cidade.max' => 'A cidade não pode ter mais de 255 caracteres.',
            'estado.size' => 'O estado deve conter exatamente 2 letras (ex: PB, SP, RJ).',

            'cep.digits' => 'O CEP deve ter entre 8 e 9 números.',
        ];
    }
}
