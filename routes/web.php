<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pacientes', [PacienteController::class, 'index']);
    Route::get('/pacientes/novo', [PacienteController::class, 'create']);
    Route::post('/pacientes', [PacienteController::class, 'store']);
    Route::get('/pacientes/{id}/editar', [PacienteController::class, 'edit']);
    Route::put('/pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');
    Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy']);
});


Route::middleware('auth')->group(function () {
    Route::get('/medicos', [MedicoController::class, 'index']);
    Route::get('/medicos/novo', [MedicoController::class, 'create']);
    Route::post('/medicos', [MedicoController::class, 'store']);
    Route::get('/medicos/{id}/editar', [MedicoController::class, 'edit']);
    Route::put('/medicos/{id}', [MedicoController::class, 'update'])->name('medicos.update');
    Route::delete('/medicos/{id}', [MedicoController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/especialidades', [EspecialidadeController::class, 'index']);
    Route::get('/especialidades/novo', [EspecialidadeController::class, 'create'])->name('especialidades.create');
    Route::post('/especialidades', [EspecialidadeController::class, 'store'])->name('especialidades.store');
    Route::get('/especialidades/{id}/editar', [EspecialidadeController::class, 'edit'])->name('especialidades.edit');
    Route::put('/especialidades/{id}', [EspecialidadeController::class, 'update'])->name('especialidades.update');
    Route::delete('/especialidades/{id}', [EspecialidadeController::class, 'destroy'])->name('especialidades.destroy');
});


require __DIR__ . '/auth.php';
