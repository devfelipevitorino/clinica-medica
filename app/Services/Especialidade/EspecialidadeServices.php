<?php

namespace App\Services\Especialidade;

use App\Http\Repositories\Especialidade\EspecialidadeRepositories;

class EspecialidadeServices
{
    private $repository;

    public function __construct(EspecialidadeRepositories $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store($request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->findById($id);
    }

    public function update($request, $id)
    {
        $especialidade = $this->repository->findById($id);

        return $this->repository->update($especialidade, $request);
    }

    public function destroy($id)
    {
        $especialidade = $this->repository->findById($id);
        return $this->repository->destroy($especialidade);
    }
}
