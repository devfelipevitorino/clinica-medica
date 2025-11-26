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
            ->where('data', $hoje)
            ->orderBy('hora')
            ->get();


        $consultas_anteriores = Consulta::with(['paciente', 'medico'])
            ->where('data', '<', $hoje)
            ->orderBy('hora')
            ->get();

        return view('dashboard', compact('pacientes', 'consultas', 'proximas_consultas', 'consultas_anteriores'));
    }
}
