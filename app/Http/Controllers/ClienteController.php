<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'n_documento' => 'required|integer',
            'sexo' => 'required|in:F,M',
            'email' => 'nullable|email',
            'direccion' => 'nullable',
            'fecha_nacimiento' => 'nullable|date'
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index');
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
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'n_documento' => ['required','digits:8'],
            'sexo' => ['required','in:M,F'],
            'email' => ['required','email'],
            'fecha_nacimiento' => ['required','date'],
            'direccion' => ['required'],
        ]);

        try {
            $cliente->update($request->all());

            return redirect()->route('clientes.index')->with('msn_success', 'El cliente se actualizo exitosamente');
        } catch (Exception) {
            return redirect()->route('clientes.edit', $cliente->id)->with('msn_error', 'El Cliente no se logro actualizar correctamente');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('msn_success', 'El cliente se elimino exitosamente');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('clientes.index')->with('msn_error', 'El cliente tiene mascotas registradas');
            } else {
                return redirect()->route('clientes.index')->with('msn_error', 'El cliente no se elimino');
            }

        } catch (Exception $e) {
            return redirect()->route('clientes.index')->with('msn_error', 'El cliente no se elimino');
        }
    }
}
