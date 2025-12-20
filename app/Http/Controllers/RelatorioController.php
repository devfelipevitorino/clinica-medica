<?php

namespace App\Http\Controllers;

use App\Services\Consulta\ConsultaServices;
use App\Services\Paciente\PacienteServices;

class RelatorioController extends Controller
{
    private $pacienteServices;
    private $consultasServices;

    public function __construct(PacienteServices $pacienteServices, ConsultaServices $consultaServices)
    {
        $this->pacienteServices = $pacienteServices;
        $this->consultasServices = $consultaServices;
    }

    public function index()
    {
        $pacientes = $this->pacienteServices->index();
        $consultas = $this->consultasServices->index();
        return view('relatorios.index', compact('pacientes', 'consultas'));
    }

    public function buscaConsultasFinalizadas()
    {
        $consultas = $this->consultasServices->buscaConsultasFinalizadas();
        return view('relatorios.historicoConsultas', compact('consultas'));
    }
}
