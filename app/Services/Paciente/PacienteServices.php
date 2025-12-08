<?php

namespace App\Services\Paciente;

use App\Http\Repositories\Paciente\PacienteRepositories;

class PacienteServices
{

    private $repository;

    public function __construct(PacienteRepositories $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store($request)
    {
        $paciente = $this->repository->storePaciente($request);

        $this->repository->storeEndereco($paciente, $request);

        return $paciente;
    }

    public function edit($id)
    {
        return $this->repository->findForEdit($id);
    }

    public function update($request, $id)
    {
        $paciente = $this->repository->findWithEndereco($id);

        $this->repository->updatePaciente($paciente, $request);

        $this->repository->updateEndereco($paciente, $request);

        return $paciente;
    }

    public function destroy($id)
    {
        $paciente = $this->repository->findById($id);

        $this->repository->destroy($paciente);

        return true;
    }
}
