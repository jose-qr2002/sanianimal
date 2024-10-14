<?php

namespace App\Http\Controllers;

use App\Http\Requests\Visit\StoreVisitRequest;
use App\Models\AppliedVaccine;
use App\Models\ClinicalHistory;
use App\Models\Vaccine;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            DB::beginTransaction();
            
            $visit = Visit::create($validData);
            
            foreach($validData['vaccines'] ?? [] as $vaccine) {
                $appliedVaccine = new AppliedVaccine();
                $appliedVaccine->date = $validData['date'];
                $appliedVaccine->time = $validData['time'];
                $appliedVaccine->vaccine_id = $vaccine['vaccine_id'];
                $appliedVaccine->observation = $vaccine['observation'];
                $appliedVaccine->visit_id = $visit->id;
                $appliedVaccine->save();
            }
            DB::commit();
            return redirect()->route('histories.index')->with('msn_success', 'La visita ha sido guardada');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('histories.index')->with('msn_error', 'Ocurrió un problema al guardar la visita');
        }

    }

    public function edit(Visit $visit) {
        $visit->load(['history.pet.customer','vaccines']);
        return view('visits.edit', compact('visit'));
    }
}
