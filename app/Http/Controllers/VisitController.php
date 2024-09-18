<?php

namespace App\Http\Controllers;

use App\Http\Requests\Visit\StoreVisitRequest;
use App\Models\ClinicalHistory;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Se encargar de mostrar un formulario para registrar una historia clinica
     * @param ClinicalHistory $history Contiene todos los datos de la historia
     * @param Request $request Contiene los valores que se pasan del formulario
     */
    public function create(ClinicalHistory $history, Request $request) {
        $lastNumber = $history->visits->max('number') + 1;

        return view('visits.create', compact('history', 'lastNumber'));
    }

    /**
     * Se encarga de procesar los datos para crear un historial clinico
     * @param StoreVisitRequest $request Contiene todos los datos enviados y los valida automaticamente
     */
    public function store(StoreVisitRequest $request) {
        $validData = $request->validated();

        try {
            Visit::create($validData);
            return redirect()->route('histories.index')->with('msn_success', 'La visita ha sido guardada N° '.$validData['number']);
        } catch (\Exception $e) {
            return redirect()->route('histories.index')->with('msn_error', 'Ocurrió un problema al guardar la visita');
        }

    }
}
