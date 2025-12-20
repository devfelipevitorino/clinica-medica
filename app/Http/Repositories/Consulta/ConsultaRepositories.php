<?php

namespace App\Http\Repositories\Consulta;

use App\Models\Consulta;

class ConsultaRepositories
{
    private $model;

    public function __construct(Consulta $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->with(['paciente', 'medico'])->latest()->get();
    }

    public function findForEdit($id)
    {
        return $this->model->with(['paciente', 'medico'])->findOrFail($id);
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function storeConsulta($request)
    {
        return $this->model->create(
            $request->only(['paciente_id', 'medico_id', 'data', 'hora', 'observacoes', 'status'])
        );
    }

    public function updateConsulta($consulta, $request)
    {
        $consulta->update(
            $request->only(['paciente_id', 'medico_id', 'data', 'hora', 'observacoes', 'status'])
        );
    }

    public function destroy($consulta)
    {
        $consulta->delete();
    }

    public function buscaConsultasDoDia()
    {
        $hoje = now()->toDateString();

        return $this->model
            ->where('data', $hoje)
            ->get();
    }
}
