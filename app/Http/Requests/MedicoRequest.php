<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('medico');

        return [
            'nome' => 'required|string|max:255',

            'crm' => [
                'required',
                'string',
                'max:20',
                'unique:medicos,crm,' . $id,
            ],

            'email' => [
                'required',
                'email',
                'unique:medicos,email,' . $id,
            ],

            'telefone' => 'required|string|max:20',
            'especialidade_id' => 'required|exists:especialidades,id',

            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|size:2',
            'cep' => 'nullable|string|max:9',
        ];
    }
}
