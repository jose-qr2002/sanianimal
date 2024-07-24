<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index() {
        $mascotas = Mascota::all();
        return view('mascotas.index', compact('mascotas'));
    }

    public function show(Mascota $mascota) {
        return view('mascotas.show', compact('mascota'));
    }

    public function create() {
        $especies = Especie::all();
        return view('mascotas.create', compact('especies'));
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => ['required'],
            'sexo' => ['required','in:Macho,Hembra,Indefinido'],
            'fecha_nacimiento' => ['nullable','date'],
            'pedigree' => ['required','boolean'],
            'especie_id' => ['required','integer','exists:especies,id'],
            'cliente_id' => ['required','integer','exists:clientes,id']
        ]);

        try {
            Mascota::create($request->all());
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
}
