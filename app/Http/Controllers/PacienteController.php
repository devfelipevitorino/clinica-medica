<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Models\Paciente;
use App\Services\Paciente\PacienteServices;
use Illuminate\Http\Request;

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

        $paciente = Paciente::create(
            $request->only(['nome', 'cpf', 'email', 'telefone', 'data_nascimento'])
        );

        $paciente->endereco()->create(
            $request->only(['rua', 'numero', 'bairro', 'cidade', 'estado', 'cep'])
        );

        return redirect('/pacientes')
            ->with('success', 'Paciente criado com sucesso!');
    }

    public function edit($id)
    {
        $paciente = Paciente::with('endereco')->findOrFail($id);

        return view('pacientes.edit', compact('paciente'));
    }

    public function update(PacienteRequest $request, $id)
    {
        $paciente = Paciente::with('endereco')->findOrFail($id);

        $paciente->update(
            $request->only(['nome', 'cpf', 'email', 'telefone', 'data_nascimento'])
        );

        $paciente->endereco->update(
            $request->only(['rua', 'numero', 'bairro', 'cidade', 'estado', 'cep'])
        );

        return redirect('/pacientes')
            ->with('success', 'Paciente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect('/pacientes')
            ->with('success', 'Paciente removido com sucesso!');
    }
}
