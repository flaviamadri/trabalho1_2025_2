<?php

use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/medico', [MedicoController::class, 'index'])->name('medico.index');
Route::get('/medico/create', [MedicoController::class, 'create'])->name('medico.create');
Route::post('/medico', [MedicoController::class, 'store'])->name('medico.store');
Route::get('/medico/edit/{id}', [MedicoController::class, 'edit'])->name('medico.edit');
Route::put('/medico/update/{id}', [MedicoController::class, 'update'])->name('medico.update');
Route::post('/medico/search', [MedicoController::class, 'search'])->name('medico.search');
Route::delete('/medico/{id}', [MedicoController::class, 'destroy'])->name('medico.destroy');
Route::get('/medico/report', [MedicoController::class, 'report'])->name('medico.report');
Route::get('/medicos/{id}/pacientes', [MedicoController::class, 'listarPacientes'])->name('medico.list_pacientes');

use App\Http\Controllers\PacienteController;
use App\Models\Paciente;

Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente.index');
Route::get('/paciente/create', [PacienteController::class, 'create'])->name('paciente.create');
Route::post('/paciente', [PacienteController::class, 'store'])->name('paciente.store');
Route::get('/paciente/edit/{id}', [PacienteController::class, 'edit'])->name('paciente.edit');
Route::put('/paciente/update/{id}', [PacienteController::class, 'update'])->name('paciente.update');
Route::post('/paciente/search', [PacienteController::class, 'search'])->name('paciente.search');
Route::get('/paciente/report', [PacienteController::class, 'report'])->name('paciente.report');
Route::delete('/paciente/{id}', [PacienteController::class, 'destroy'])->name('paciente.destroy');

use App\Http\Controllers\ConsultaController;

Route::get('/consulta', [ConsultaController::class, 'index'])->name('consulta.index');
Route::get('/consulta/create', [ConsultaController::class, 'create'])->name('consulta.create');
Route::post('/consulta', [ConsultaController::class, 'store'])->name('consulta.store');
Route::get('/consulta/edit/{id}', [ConsultaController::class, 'edit'])->name('consulta.edit');
Route::put('/consulta/update/{id}', [ConsultaController::class, 'update'])->name('consulta.update');
Route::post('/consulta/search', [ConsultaController::class, 'search'])->name('consulta.search');
Route::delete('/consulta/{id}', [ConsultaController::class, 'destroy'])->name('consulta.destroy');

