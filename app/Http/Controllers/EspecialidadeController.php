<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspecialidadeRequest;
use App\Services\Especialidade\EspecialidadeServices;

class EspecialidadeController extends Controller
{
    private $services;

    public function __construct(EspecialidadeServices $services)
    {
        $this->services = $services;
    }

    public function index()
    {
        $especialidades = $this->services->index();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(EspecialidadeRequest $request)
    {
        $this->services->store($request);

        if ($request->from_modal) {
            return redirect()->back()->with('success', 'Especialidade criada!');
        }

        return redirect('/especialidades')
            ->with('success', 'Especialidade cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $especialidade = $this->services->edit($id);
        return view('especialidades.edit', compact('especialidade'));
    }

    public function update(EspecialidadeRequest $request, $id)
    {
        $this->services->update($request, $id);

        return redirect('/especialidades')
            ->with('success', 'Especialidade atualizada!');
    }

    public function destroy($id)
    {
        $this->services->destroy($id);

        return redirect('/especialidades')
            ->with('success', 'Especialidade removida!');
    }
}
