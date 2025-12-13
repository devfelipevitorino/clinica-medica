<?php

namespace App\Services\Consulta;

use App\Http\Repositories\Consulta\ConsultaRepositories;

class ConsultaServices
{
    private $repository;

    public function __construct(ConsultaRepositories $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store($request)
    {
        return $this->repository->storeConsulta($request);
    }

    public function edit($id)
    {
        return $this->repository->findForEdit($id);
    }

    public function update($request, $id)
    {
        $consulta = $this->repository->findById($id);

        $this->repository->updateConsulta($consulta, $request);

        return $consulta;
    }

    public function destroy($id)
    {
        $consulta = $this->repository->findById($id);

        $this->repository->destroy($consulta);

        return true;
    }

    public function buscaConsultasDoDia()
    {
        $consultas = $this->repository->buscaConsultasDoDia();
        return $consultas;
    }
}
