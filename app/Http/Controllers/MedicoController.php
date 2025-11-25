<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Models\Especialidade;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::with('endereco')->get();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        $especialidades = Especialidade::all();
        return view('medicos.create', compact('especialidades'));
    }

    public function store(MedicoRequest $request)
    {

        $medico = Medico::create(
            $request->only(['nome', 'crm', 'telefone', 'email', 'especialidade_id'])
        );

        $medico->endereco()->create(
            $request->only(['rua', 'numero', 'bairro', 'cidade', 'estado', 'cep'])
        );

        return redirect('/medicos')
            ->with('success', 'Medico criado com sucesso!');
    }

    public function edit($id)
    {
        $medico = Medico::with('endereco')->findOrFail($id);
        $especialidades = Especialidade::all();

        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    public function update(MedicoRequest $request, $id)
    {
        $medico = Medico::with('endereco')->findOrFail($id);

        $medico->update(
            $request->only(['nome', 'crm', 'telefone', 'email', 'especialidade_id'])
        );

        $medico->endereco->update(
            $request->only(['rua', 'numero', 'bairro', 'cidade', 'estado', 'cep'])
        );

        return redirect('/medicos')
            ->with('success', 'Medico atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect('/medicos')
            ->with('success', 'Medico removido com sucesso!');
    }
}
