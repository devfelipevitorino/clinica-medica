<?php

namespace App\Services\Medico;

use App\Http\Repositories\Medico\MedicoRepositories;

class MedicoServices
{
    private $repository;

    public function __construct(MedicoRepositories $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function getEspecialidades()
    {
        return $this->repository->getEspecialidades();
    }

    public function store($request)
    {
        $medico = $this->repository->storeMedico($request);
        $this->repository->storeEndereco($medico, $request);

        return $medico;
    }

    public function edit($id)
    {
        return $this->repository->findForEdit($id);
    }

    public function update($request, $id)
    {
        $medico = $this->repository->findWithEndereco($id);

        $this->repository->updateMedico($medico, $request);
        $this->repository->updateEndereco($medico, $request);

        return $medico;
    }

    public function destroy($id)
    {
        $medico = $this->repository->findById($id);
        $this->repository->destroy($medico);

        return true;
    }
}
