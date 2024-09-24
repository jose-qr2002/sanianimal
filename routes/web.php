<?php

use App\Http\Controllers\ClinicalHistoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'store'])->name('login.store');

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Clientes
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/edit/{customer}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/update/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/delete/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    Route::get('/customers/search/{value}', [CustomerController::class, 'search'])->name('customers.search');

    //Medicamentos
    Route::get('/medications', [MedicationController::class, 'index'])->name('medications.index');
    Route::get('/medications/create', [MedicationController::class, 'create'])->name('medications.create');
    Route::post('/medications/store', [MedicationController::class, 'store'])->name('medications.store');
    Route::get('/medications/edit/{medication}', [MedicationController::class, 'edit'])->name('medications.edit');
    Route::put('/medications/update/{medication}', [MedicationController::class, 'update'])->name('medications.update');
    Route::delete('/medications/delete/{medication}', [MedicationController::class, 'destroy'])->name('medications.destroy');

    // Mascotas
    Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
    Route::get('/mascota/{pet}', [PetController::class, 'show'])->name('pets.show');
    Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');
    Route::post('/pets/store', [PetController::class, 'store'])->name('pets.store');
    Route::get('/pets/edit/{pet}', [PetController::class, 'edit'])->name('pets.edit');
    Route::put('/pets/update/{pet}', [PetController::class, 'update'])->name('pets.update');
    Route::delete('/pets/delete/{pet}', [PetController::class, 'destroy'])->name('pets.destroy');

    /**
     * Rutas para historias clinicas
     */
    Route::get('/histories', [ClinicalHistoryController::class, 'index'])->name('histories.index');
    Route::get('/histories/serve', [ClinicalHistoryController::class, 'serve'])->name('histories.serve');
    Route::post('/histories/store/{pet}', [ClinicalHistoryController::class, 'store'])->name('histories.store');

    /** */
    Route::get('/visits/{history}', [VisitController::class, 'create'])->name('visits.create');
    Route::post('/visits/store', [VisitController::class, 'store'])->name('visits.store');

    // Vaccines
    Route::get('/api/vaccines', [VaccineController::class, 'index'])->name('vaccines.index');

});
