<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Medico;
use App\Http\Requests\ConsultaRequest;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with(['paciente', 'medico'])->get();
        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos   = Medico::all();

        return view('consultas.create', compact('pacientes', 'medicos'));
    }

    public function store(ConsultaRequest $request)
    {
        Consulta::create(
            $request->only(['paciente_id', 'medico_id', 'data', 'hora', 'observacoes', 'status'])
        );

        return redirect('/consultas')
            ->with('success', 'Consulta criada com sucesso!');
    }

    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);
        $pacientes = Paciente::all();
        $medicos   = Medico::all();

        return view('consultas.edit', compact('consulta', 'pacientes', 'medicos'));
    }

    public function update(ConsultaRequest $request, $id)
    {
        $consulta = Consulta::findOrFail($id);

        $consulta->update(
            $request->only(['paciente_id', 'medico_id', 'data', 'hora', 'observacao', 'status'])
        );

        return redirect('/consultas')
            ->with('success', 'Consulta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return redirect('/consultas')
            ->with('success', 'Consulta removida com sucesso!');
    }
}
