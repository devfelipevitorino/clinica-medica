<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use App\Models\Paciente;

class DashboardController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        $consultas = Consulta::all();

        $hoje = now()->toDateString();

        $proximas_consultas = Consulta::with(['paciente', 'medico'])
            ->where('status', 'espera')
            ->orderBy('hora')
            ->limit(5)
            ->get();


        $consultas_anteriores = Consulta::with(['paciente', 'medico'])
            ->where('status', 'finalizado')
            ->orderBy('hora')
            ->limit(5)
            ->get();

        $em_atendimento = Consulta::with(['paciente', 'medico'])
            ->where('status', 'em_atendimento')
            ->orderBy('data')
            ->orderBy('hora')
            ->limit(5)
            ->get();

        return view('dashboard', compact('pacientes', 'consultas', 'proximas_consultas', 'consultas_anteriores', 'em_atendimento'));
    }
}
