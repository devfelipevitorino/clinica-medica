<?php

namespace App\Http\Repositories\Medico;

use App\Models\Medico;
use App\Models\Especialidade;

class MedicoRepositories
{
    private $model;

    public function __construct(Medico $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->with('endereco')->latest()->get();
    }

    public function getEspecialidades()
    {
        return Especialidade::all();
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

    public function storeMedico($request)
    {
        return $this->model->create(
            $request->only(['nome', 'crm', 'telefone', 'email', 'especialidade_id'])
        );
    }

    public function storeEndereco($medico, $request)
    {
        $medico->endereco()->create(
            $request->only(['rua', 'numero', 'bairro', 'cidade', 'estado', 'cep'])
        );
    }

    public function updateMedico($medico, $request)
    {
        $medico->update(
            $request->only(['nome', 'crm', 'telefone', 'email', 'especialidade_id'])
        );
    }

    public function updateEndereco($medico, $request)
    {
        $medico->endereco->update(
            $request->only(['rua', 'numero', 'bairro', 'cidade', 'estado', 'cep'])
        );
    }

    public function destroy($medico)
    {
        $medico->delete();
    }
}
