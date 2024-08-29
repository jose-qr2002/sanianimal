<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cliente\StoreClienteRequest;
use App\Http\Requests\Cliente\UpdateClienteRequest;
use App\Models\Cliente;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Muestra la lista de todos los clientes
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Muestra un formulario para crear un cliente
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Crear un registro de Cliente
     */
    public function store(StoreClienteRequest $request)
    {
        $validos = $request->validated();
        try {
            Cliente::create($validos);
            return redirect()->route('clientes.index')->with('msn_success', 'El cliente se registro exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('clientes.create')->with('msn_error', 'El cliente no se pudo registrar');
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
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $validos = $request->validated();
        try {
            $cliente->update($validos);
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

    public function search(string $value) {
        $clientes = Cliente::select('id','nombre','apellido','n_documento')->whereRaw("CONCAT(nombre,' ',apellido, ' ', n_documento) LIKE '%{$value}%'")->limit(5)->get();
        if($clientes->count() < 1) {
            return response()->json(
                [
                    'type' => 'error',
                    'message' => 'No se encontraron clientes',
                    'data' => []
                ]
            );
        }

        return response()->json(
            [
                'type' => 'success',
                'message' => 'Se encontraron '.$clientes->count().' clientes',
                'data' => $clientes
            ]
        );
    }
}
