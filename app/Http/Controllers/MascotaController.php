<?php

namespace App\Http\Controllers;

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
}
