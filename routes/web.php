<?php

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
    return view('welcome');
});

Route::get('/medico', [MedicoController::class, 'index'])->name('medico.index');
Route::get('/medico/create', [MedicoController::class, 'create'])->name('medico.create');
Route::post('/medico', [MedicoController::class, 'store'])->name('medico.store');
Route::get('/medico/edit/{id}', [MedicoController::class, 'edit'])->name('medico.edit');
Route::put('/medico/update/{id}', [MedicoController::class, 'update'])->name('medico.update');
Route::post('/medico/search', [MedicoController::class, 'search'])->name('medico.search');
Route::delete('/medico/{id}', [MedicoController::class, 'destroy'])->name('medico.destroy');
