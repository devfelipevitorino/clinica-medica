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
        return $this->model->with('endereco')->get();
    }
}
