<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pet\StorePetRequest;
use App\Http\Requests\Pet\UpdatePetRequest;
use App\Models\Pet;
use App\Models\Specie;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Muestra todos los registros de las mascotas
     */
    public function index() {
        $pets = Pet::paginate(10);
        return view('pets.index', compact('pets'));
    }

    /**
     * Muestra la informacion de una mascota
     * @param Pet $pet Se pasa un modelo de mascotas a travez de 
     * Route Model Biding
     */
    public function show(Pet $pet) {
        return view('pets.show', compact('pet'));
    }

    /**
     * Muestra un formulario para crear una mascota
     */
    public function create() {
        $species = Specie::all();
        return view('pets.create', compact('species'));
    }

    /**
     * Muestra la informacion de una mascota
     * @param StorePetRequest $request FormRequest que valida los datos de la mascota enviada
     */
    public function store(StorePetRequest $request) {
        $validData = $request->validated();
        try {
            Pet::create($validData);
            return redirect()->route('pets.index')->with('msn_success', 'Se registro la mascota');
        } catch (\Exception $e) {
            return redirect()->route('pets.create')->with('msn_error', 'No se logro registrar a la mascota');
        }
    }

    /**
     * Muestra un formulario para editar la mascota
     * @param Pet $pet Se pasa un modelo de mascotas a travez de 
     * Route Model Biding
     */
    public function edit(Pet $pet) {
        $species = Specie::all();
        $customer = $pet->customer;
        return view('pets.edit', compact('pet', 'species', 'customer'));
    }

    /**
     * Muestra la informacion de una mascota
     * @param Pet $pet Se pasa un modelo de mascotas a travez de 
     * Route Model Biding
     * @param UpdatePetRequest $request FormRequest que valida los datos de la mascota enviada
     */
    public function update(Pet $pet, UpdatePetRequest $request) {
        $validData = $request->validated();
        try {
            $pet->update($validData);
            return redirect()->route('pets.index')->with('msn_success', 'La mascota se actualizo exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('pets.edit', $pet->id)->with('msn_error', 'La mascota no se logro actualizar correctamente');
        }
    }

    /**
     * Elimina un registro de mascotas
     * @param Pet $pet Se pasa un modelo de mascotas a travez de 
     * Route Model Biding
     */
    public function destroy(Pet $pet)
    {
        try {
            $pet->delete();
            return redirect()->route('pets.index')->with('msn_success', 'Las mascotas se elimino correctamente');
        } catch (\Exception $e) {
            return redirect()->route('pets.index')->with('msn_error', 'Las mascotas no se elimino');
        }
    }
}
