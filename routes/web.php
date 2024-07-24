<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'store'])->name('login.store');

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes/store', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/edit/{cliente}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/update/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/delete/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    Route::get('/clientes/search/{valor}', [ClienteController::class, 'search'])->name('clientes.search');

    //Medicamentos
    Route::get('/medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos.index');
    Route::get('/medicamentos/create', [MedicamentoController::class, 'create'])->name('medicamentos.create');
    Route::post('/medicamentos/store', [MedicamentoController::class, 'store'])->name('medicamentos.store');
    Route::get('/medicamentos/edit/{medicamento}', [MedicamentoController::class, 'edit'])->name('medicamentos.edit');
    Route::put('/medicamentos/update/{medicamento}', [MedicamentoController::class, 'update'])->name('medicamentos.update');
    Route::delete('/medicamentos/delete/{medicamento}', [MedicamentoController::class, 'destroy'])->name('medicamentos.destroy');

    // Mascotas
    Route::get('/mascotas', [MascotaController::class, 'index'])->name('mascotas.index');
    Route::get('/mascota/{mascota}', [MascotaController::class, 'show'])->name('mascotas.show');
    Route::get('/mascotas/create', [MascotaController::class, 'create'])->name('mascotas.create');
    Route::post('/mascotas/store', [MascotaController::class, 'store'])->name('mascotas.store');
    Route::get('/mascotas/edit/{mascota}', [MascotaController::class, 'edit'])->name('mascotas.edit');
    Route::put('/mascotas/update/{mascota}', [MascotaController::class, 'update'])->name('mascotas.update');
    Route::delete('/mascotas/delete/{mascota}', [MascotaController::class, 'destroy'])->name('mascotas.destroy');
});
