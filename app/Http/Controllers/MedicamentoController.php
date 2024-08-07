<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicamentos = Medicamento::all();
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
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required'],
            'marca' => ['required'],
            'stock' => ['required','integer','min:0'],
            'precio' => ['required','numeric','min:0.10'],
            'descripcion' => ['nullable','max:1000'],
        ]);

        try {
            Medicamento::create($request->all());
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
    public function update(Request $request, Medicamento $medicamento)
    {
        $request->validate([
            'nombre' => ['required'],
            'marca' => ['required'],
            'stock' => ['required','integer','min:1'],
            'precio' => ['required','numeric','min:0.10'],
            'descripcion' => ['required']
        ]);

        try {
            $medicamento->update($request->all());
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
