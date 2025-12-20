<?php

namespace App\Http\Repositories\Paciente;

use App\Models\Paciente;

class PacienteRepositories
{
    private $model;

    public function __construct(Paciente $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->with('endereco')->latest()->get();
    }

    public function findForEdit($id)
    {
        return $this->model->with('endereco')->findOrFail($id);
    }

    public function findWithEndereco($id)
    {
        return $this->model->with('endereco')->findOrFail($id);
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }


    public function storePaciente($request)
    {
        return $this->model->create(
            $request->only(['nome', 'cpf', 'email', 'telefone', 'data_nascimento'])
        );
    }

    public function storeEndereco($paciente, $request)
    {
        $paciente->endereco()->create(
            $request->only(['rua', 'numero', 'bairro', 'cidade', 'estado', 'cep'])
        );
    }

    public function updatePaciente($paciente, $request)
    {
        $paciente->update(
            $request->only(['nome', 'cpf', 'email', 'telefone', 'data_nascimento'])
        );
    }

    public function updateEndereco($paciente, $request)
    {
        $paciente->endereco->update(
            $request->only(['rua', 'numero', 'bairro', 'cidade', 'estado', 'cep'])
        );
    }

    public function destroy($paciente)
    {
        $paciente->delete();
    }
}
