<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\HistoriaClinica;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    public function index(){
        $historias = HistoriaClinica::all();
        return view('historias.index', compact('historias'));
    }

    public function atenderCliente(Request $request) {
        if ($request->n_documento) {
            $cliente = Cliente::where('n_documento', $request->n_documento)->with('mascotas')->first();
            if(!$cliente) {
                $cliente = [];
            }
            
            return view('historias.atenderCliente', compact('cliente'));
        }
        

        return view('historias.atenderCliente');
    }

    public function create(Request $request) {
        return view('historias.create');
    }
}
