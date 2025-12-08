<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Services\Paciente\PacienteServices;

class PacienteController extends Controller
{

    private $services;

    public function __construct(PacienteServices $services)
    {
        $this->services = $services;
    }

    public function index()
    {
        $pacientes = $this->services->index();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(PacienteRequest $request)
    {
        $this->services->store($request);

        return redirect('/pacientes')
            ->with('success', 'Paciente criado com sucesso!');
    }

    public function edit($id)
    {
        $paciente = $this->services->edit($id);

        return view('pacientes.edit', compact('paciente'));
    }

    public function update(PacienteRequest $request, $id)
    {
        $this->services->update($request, $id);

        return redirect('/pacientes')
            ->with('success', 'Paciente atualizado com sucesso!');
    }


    public function destroy($id)
    {
        $this->services->destroy($id);

        return redirect('/pacientes')
            ->with('success', 'Paciente removido com sucesso!');
    }
}
