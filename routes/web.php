<?php

use App\Http\Controllers\AppliedVaccineController;
use App\Http\Controllers\ClinicalHistoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ServiceController;
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
    Route::get('/histories/create/{pet}', [ClinicalHistoryController::class, 'create'])->name('histories.create');
    Route::post('/histories/store', [ClinicalHistoryController::class, 'store'])->name('histories.store');

    /** VISITAS */
    Route::get('/visit/create/{history}', [VisitController::class, 'create'])->name('visits.create');
    Route::post('/visit/store', [VisitController::class, 'store'])->name('visits.store');
    Route::get('/visit/edit/{visit}', [VisitController::class, 'edit'])->name('visits.edit');

    /** APPLIED VACCINES */
    Route::get('/visit/edit/{visit}/applied_vaccine/{applied_vaccine}', [AppliedVaccineController::class, 'edit'])->name('visits.edit.vaccine');
    Route::put('/visit/update/{visit}/applied_vaccine/{applied_vaccine}', [AppliedVaccineController::class, 'update'])->name('visits.update.vaccine');
    Route::get('/visit/create/{visit}/applied_vaccine/', [AppliedVaccineController::class, 'create'])->name('visits.create.vaccine');
    Route::post('/visit/store/{visit}/applied_vaccine/', [AppliedVaccineController::class, 'store'])->name('visits.store.vaccine');

    // Vaccines
    Route::get('/api/vaccines', [VaccineController::class, 'index'])->name('vaccines.index');

     //Proveedores
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers/store', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/edit/{supplier}', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/update/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/suppliers/delete/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    
    // Servicios
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/edit/{service}', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/update/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/delete/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});
