<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mascota\StoreMascotaRequest;
use App\Http\Requests\Mascota\UpdateMascotaRequest;
use App\Models\Especie;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index() {
        $mascotas = Mascota::paginate(10);
        return view('mascotas.index', compact('mascotas'));
    }

    public function show(Mascota $mascota) {
        return view('mascotas.show', compact('mascota'));
    }

    public function create() {
        $especies = Especie::all();
        return view('mascotas.create', compact('especies'));
    }

    public function store(StoreMascotaRequest $request) {
        $validos = $request->validated();
        try {
            Mascota::create($validos);
            return redirect()->route('mascotas.index')->with('msn_success', 'Se registro la mascota');
        } catch (\Exception $e) {
            return redirect()->route('clientes.create')->with('msn_error', 'No se logro registrar a la mascota');
        }
    }

    public function edit(Mascota $mascota) {
        $especies = Especie::all();
        $cliente = $mascota->cliente;
        return view('mascotas.edit', compact('mascota', 'especies', 'cliente'));
    }

    public function update(Mascota $mascota, UpdateMascotaRequest $request) {
        $validos = $request->validated();
        try {
            $mascota->update($validos);
            return redirect()->route('mascotas.index')->with('msn_success', 'La mascota se actualizo exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('mascotas.edit', $mascota->id)->with('msn_error', 'La mascota no se logro actualizar correctamente');
        }
    }

    public function destroy(Mascota $mascota)
    {
        try {
            $mascota->delete();
            return redirect()->route('mascotas.index')->with('msn_success', 'Las mascotas se elimino correctamente');
        } catch (\Exception $e) {
            return redirect()->route('mascotas.index')->with('msn_error', 'Las mascotas no se elimino');
        }
    }
}
