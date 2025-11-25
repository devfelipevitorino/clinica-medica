<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function index()
    {
        $especialidades = Especialidade::orderBy('nome')->get();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|unique:especialidades,nome',
            'descricao' => 'nullable|string'
        ]);

        Especialidade::create($validated);

        if ($request->from_modal) {
            return redirect()->back()->with('success', 'Especialidade criada!');
        }

        return redirect('/especialidades')->with('success', 'Especialidade cadastrada com sucesso!');
    }


    public function edit($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.edit', compact('especialidade'));
    }

    public function update(Request $request, $id)
    {
        $especialidade = Especialidade::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|unique:especialidades,nome,' . $id,
            'descricao' => 'nullable|string'
        ]);

        $especialidade->update($validated);

        return redirect('/especialidades')->with('success', 'Especialidade atualizada!');
    }

    public function destroy($id)
    {
        Especialidade::findOrFail($id)->delete();

        return redirect('/especialidades')->with('success', 'Especialidade removida!');
    }
}
