<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Services\Consulta\ConsultaServices;
use App\Models\Paciente;
use App\Models\Medico;

class ConsultaController extends Controller
{
    private $services;

    public function __construct(ConsultaServices $services)
    {
        $this->services = $services;
    }

    public function index()
    {
        $consultas = $this->services->index();
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
        $this->services->store($request);

        return redirect('/consultas')
            ->with('success', 'Consulta criada com sucesso!');
    }

    public function edit($id)
    {
        $consulta = $this->services->edit($id);
        $pacientes = Paciente::all();
        $medicos   = Medico::all();

        return view('consultas.edit', compact('consulta', 'pacientes', 'medicos'));
    }

    public function update(ConsultaRequest $request, $id)
    {
        $this->services->update($request, $id);

        return redirect('/consultas')
            ->with('success', 'Consulta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $this->services->destroy($id);

        return redirect('/consultas')
            ->with('success', 'Consulta removida com sucesso!');
    }

    public function consultasDoDia()
    {
        $consultas = $this->services->buscaConsultasDoDia();

        return view('consultas.listagemConsultasDia', compact('consultas'));
    }
}
