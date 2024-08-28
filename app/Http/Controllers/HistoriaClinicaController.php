<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\HistoriaClinica;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    public function index(){
        $historias = HistoriaClinica::paginate(10);
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

    public function create(Cliente $cliente, Request $request) {
        $ultimoNumero = HistoriaClinica::max('numero') + 1;
        return view('historias.create', compact('cliente', 'ultimoNumero'));
    }

    public function store(Request $request) {
        $validos = $request->validate([
            'numero' => ['required','integer','unique:historias_clinicas,numero'],
            'motivo' => ['nullable','string'],
            'mucosas' => ['nullable', 'string'],
            'amnanesis' => ['nullable', 'string'],
            'diagnostico' => ['nullable', 'string'],
            'tratamiento' => ['nullable', 'string'],
            'precio' => ['nullable', 'string'],
            'peso' => ['nullable', 'decimal:2,4'],
            'fecha' => ['required', 'date'],
            'mascota_id' => ['required', 'integer']
        ]);

        try {
            $validos['user_id'] = $request->user()->id;
            HistoriaClinica::create($validos);
            return redirect()->route('historias.index')->with('msn_success', 'La historia clinica ha sido guardada N° '.$validos['numero']);
        } catch (\Exception $e) {
            return redirect()->route('clientes.create')->with('msn_error', 'Ocurrió un problema al guardar la historia');
        }

    }
}
