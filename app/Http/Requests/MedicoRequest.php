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
                'string',
                'max:20',
                Rule::unique('medicos', 'crm')->ignore($id),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('medicos', 'email')->ignore($id),
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
