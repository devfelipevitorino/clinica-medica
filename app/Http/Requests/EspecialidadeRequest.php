<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecialidadeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('id');

        return [
            'nome' => 'required|string|unique:especialidades,nome,' . $id,
            'descricao' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome da especialidade é obrigatório.',
            'nome.string' => 'O nome da especialidade deve ser um texto válido.',
            'nome.unique' => 'Já existe uma especialidade cadastrada com esse nome.',

            'descricao.string' => 'A descrição deve ser um texto válido.'
        ];
    }
}
