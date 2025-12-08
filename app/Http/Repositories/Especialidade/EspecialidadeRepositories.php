<?php

namespace App\Http\Repositories\Especialidade;

use App\Models\Especialidade;

class EspecialidadeRepositories
{
    private $model;

    public function __construct(Especialidade $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->orderBy('nome')->get();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($request)
    {
        return $this->model->create(
            $request->only(['nome', 'descricao'])
        );
    }

    public function update($especialidade, $request)
    {
        return $especialidade->update(
            $request->only(['nome', 'descricao'])
        );
    }

    public function destroy($especialidade)
    {
        return $especialidade->delete();
    }
}
