<?php

namespace App\Services\Paciente;

use App\Http\Repositories\Paciente\PacienteRepositories;
use App\Models\Paciente;

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
}
