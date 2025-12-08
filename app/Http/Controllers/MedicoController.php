<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Services\Medico\MedicoServices;

class MedicoController extends Controller
{
    private $services;

    public function __construct(MedicoServices $services)
    {
        $this->services = $services;
    }

    public function index()
    {
        $medicos = $this->services->index();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        $especialidades = $this->services->getEspecialidades();
        return view('medicos.create', compact('especialidades'));
    }

    public function store(MedicoRequest $request)
    {
        $this->services->store($request);

        return redirect('/medicos')
            ->with('success', 'Medico criado com sucesso!');
    }

    public function edit($id)
    {
        $medico = $this->services->edit($id);
        $especialidades = $this->services->getEspecialidades();

        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    public function update(MedicoRequest $request, $id)
    {
        $this->services->update($request, $id);

        return redirect('/medicos')
            ->with('success', 'Medico atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->services->destroy($id);

        return redirect('/medicos')
            ->with('success', 'Medico removido com sucesso!');
    }
}
