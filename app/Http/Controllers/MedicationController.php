<?php

namespace App\Http\Controllers;

use App\Http\Requests\Medication\StoreMedicationRequest;
use App\Http\Requests\Medication\UpdateMedicationRequest;
use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Muestra una vista con todos los registros de los medicamentos
     */
    public function index()
    {
        $medications = Medication::paginate(10);
        return view('medications.index', compact('medications'));
    }

    /**
     * Muestra un formulario para crear una vacuna
     */
    public function create()
    {
        return view('medications.create');
    }

    /**
     * Crea un nuevo registro de medicamentos en la base de datos
     * @param StoreMedicationRequest $request FormRequest que valida los datos del Medicamento enviado
     */
    public function store(StoreMedicationRequest $request)
    {
        // Recupera los datos que han sido validados
        $validData = $request->validated();
        try {
            Medication::create($validData);
            return redirect()->route('medications.index')->with('msn_success', 'El medicamento fue registrado con exito');
        } catch (\Exception $e) {
            return redirect()->route('medications.create')->with('msn_error', 'El medicamento no fue registrado');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Muestra un formulario para registrar medicamentos
     */
    public function edit(Medication $medication)
    {
        return view('medications.edit', compact('medication'));
    }

    /**
     * Crea un nuevo registro de medicamentos en la base de datos
     * @param UpdateMedicationRequest $request FormRequest que valida los datos del Medicamento enviado
     * @param Mediaction $medication Modelo de Medicamento, se pasa automaticamente
     * bajo la tecnica de Route Model Biding
     */
    public function update(UpdateMedicationRequest $request, Medication $medication)
    {
        // Recupera los datos que han sido validados
        $validData = $request->validated();
        try {
            $medication->update($validData);
            return redirect()->route('medications.index')->with('msn_success', 'El Medicamento se actualizo exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('medications.edit', $medication)->with('msn_error', 'El Medicamento no se logro actualizar correctamente');
        }
    }

    /**
     * Elimina un registro de medicamentos
     * @param Mediaction $medication Modelo de Medicamento, se pasa automaticamente
     * bajo la tecnica de Route Model Biding
     */
    public function destroy(Medication $medication)
    {
        try {
            $medication->delete();
            return redirect()->route('medications.index')->with('msn_success', 'El Medicamento se elimino correctamente');
        } catch (\Exception $e) {
            return redirect()->route('medications.index')->with('msn_error', 'El Medicamento no se elimino');
        }
    }
}
