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
                'digits_between:3,6', // CRM só números
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
            'numero' => 'required|numeric',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|size:2',
            'cep' => 'nullable|digits:8',
        ];
    }

    public function messages(): array
    {
        return [

            'required' => 'Campo obrigatório.',
            'unique' => 'Este valor já está em uso.',

            'nome.required' => 'O nome é obrigatório.',
            'nome.max'      => 'O nome não pode ter mais de 255 caracteres.',

            'crm.required'        => 'O CRM é obrigatório.',
            'crm.digits_between'  => 'O CRM deve conter entre 3 e 6 números.',
            'crm.unique'          => 'Este CRM já está cadastrado.',

            'email.required' => 'O email é obrigatório.',
            'email.email'    => 'O email informado não é válido.',
            'email.unique'   => 'Este email já está cadastrado.',

            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.digits'   => 'O telefone deve conter 11 números (DDD + número).',

            'especialidade_id.required' => 'A especialidade é obrigatória.',
            'especialidade_id.exists'   => 'A especialidade selecionada é inválida.',

            'rua.required'   => 'A rua é obrigatória.',
            'numero.numeric' => 'O número deve conter apenas números.',
            'bairro.required' => 'O bairro é obrigatório.',
            'cidade.required' => 'A cidade é obrigatória.',

            'estado.required' => 'O estado é obrigatório.',
            'estado.size'     => 'O estado deve conter exatamente 2 letras (ex: PB, SP, RJ).',

            'cep.digits'      => 'O CEP deve conter 8 números.',
        ];
    }
}
