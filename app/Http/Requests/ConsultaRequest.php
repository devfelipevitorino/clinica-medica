<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id'   => 'required|exists:medicos,id',
            'data'        => 'required|date',
            'hora'        => 'required',
            'observacoes' => 'nullable|string'
        ];
    }
}
