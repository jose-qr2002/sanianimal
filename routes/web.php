<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MedicamentoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

//Medicamentos
Route::get('/medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos.index');
Route::get('/medicamentos/create', [MedicamentoController::class, 'create'])->name('medicamentos.create');

// Mascotas
Route::get('/mascotas', function() { return view('mascotas.index'); })->name('mascotas.index');