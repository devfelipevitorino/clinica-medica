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
            'data'        => 'required|date|after_or_equal:today',
            'hora'        => 'required',
            'observacoes' => 'nullable|string',
            'status'      => 'required'
        ];
    }

    public function withValidator($validator)
    {

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            return;
        }

        $validator->after(function ($validator) {

            $data = $this->input('data');
            $hora = $this->input('hora');

            if (!$data || !$hora) {
                return;
            }

            $dataHora = $data . ' ' . $hora;

            try {
                $consulta = \Carbon\Carbon::parse($dataHora);
            } catch (\Exception $e) {
                $validator->errors()->add('data', 'Data ou hora inválida.');
                return;
            }

            $agora = \Carbon\Carbon::now();

            if ($consulta->lessThanOrEqualTo($agora)) {
                $validator->errors()->add(
                    'data',
                    'A consulta deve ser marcada para um horário futuro.'
                );
            }
        });
    }


    public function messages(): array
    {
        return  [
            'paciente_id.required' => 'Selecione um paciente.',
            'paciente_id.exists'   => 'O paciente informado não foi encontrado.',

            'medico_id.required'   => 'Selecione um médico.',
            'medico_id.exists'     => 'O médico informado não foi encontrado.',

            'data.required'        => 'A data da consulta é obrigatória.',
            'data.date'            => 'Informe uma data válida para a consulta.',
            'data.after_or_equal'  => 'Informe uma data válida para a consulta.',

            'hora.required'        => 'O horário da consulta é obrigatório.',

            'observacoes.string'   => 'As observações devem conter apenas texto válido.',

            'status.required'   => 'O status é obrigatório.',
        ];
    }
}
