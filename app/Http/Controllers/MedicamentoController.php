<?php

namespace App\Http\Controllers;

use App\Http\Requests\Medicamento\StoreMedicamentoRequest;
use App\Http\Requests\Medicamento\UpdateMedicamentoRequest;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicamentos = Medicamento::paginate(10);
        return view('medicamentos.index', compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicamentoRequest $request)
    {
        $validos = $request->validated();
        try {
            Medicamento::create($validos);
            return redirect()->route('medicamentos.index')->with('msn_success', 'El medicamento fue registrado con exito');
        } catch (\Exception $e) {
            return redirect()->route('medicamentos.create')->with('msn_error', 'El medicamento no fue registrado');
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
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        return view('medicamentos.edit', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicamentoRequest $request, Medicamento $medicamento)
    {
        $validos = $request->validated();
        try {
            $medicamento->update($validos);
            return redirect()->route('medicamentos.index')->with('msn_success', 'El Medicamento se actualizo exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('medicamentos.edit', $medicamento)->with('msn_error', 'El Medicamento no se logro actualizar correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        try {
            $medicamento->delete();
            return redirect()->route('medicamentos.index')->with('msn_success', 'El Medicamento se elimino correctamente');
        } catch (\Exception $e) {
            return redirect()->route('medicamentos.index')->with('msn_error', 'El Medicamento no se elimino');
        }
    }
}
