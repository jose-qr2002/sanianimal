<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppliedVaccine\StoreAppliedVaccineRequest;
use App\Http\Requests\AppliedVaccine\UpdateAppliedVaccineRequest;
use App\Models\AppliedVaccine;
use App\Models\Vaccine;
use App\Models\Visit;
use Illuminate\Support\Facades\Log;

class AppliedVaccineController extends Controller
{
    public function create(Visit $visit) {
        $vaccines = Vaccine::all();
        return view('visits.applied_vaccines.create', compact('visit', 'vaccines'));
    }

    public function store(StoreAppliedVaccineRequest $request,Visit $visit) {
        $validData = $request->validated();
        try {
            $visit->vaccines()->attach($validData['vaccine_id'], 
                                            [
                                                'observation' => $validData['observation'], 
                                                'date' => $visit->date,
                                                'time' => $visit->time
                                            ]);
            return redirect()->route('visits.edit', $visit)->with('msn_success', 'La vacuna aplicada se registro exitosamente');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('visits.edit', $visit)->with('msn_error', 'Hubo un error al registrar la vacuna aplicada');
        }
    }

    public function edit(Visit $visit, AppliedVaccine $appliedVaccine) {
        return view('visits.applied_vaccines.edit', compact('appliedVaccine', 'visit'));
    }

    public function update(UpdateAppliedVaccineRequest $request, Visit $visit, AppliedVaccine $appliedVaccine) {
        $validData = $request->validated();
        try {
            $appliedVaccine->update($validData);
            return redirect()->route('visits.edit', $visit)->with('msn_success', 'La vacuna se actualizo correctamente');
        } catch (\Exception $e) {
            return redirect()->route('visits.edit', $visit)->with('msn_error', 'Hubo un error al actualizar la vacuna');
        }
        
    }

    public function destroy(Visit $visit, AppliedVaccine $appliedVaccine) {
        try {
            $visit->vaccines()->detach($appliedVaccine->vaccine_id);
            return redirect()->route('visits.edit', $visit)->with('msn_success', 'La vacuna se elimino exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('visits.edit', $visit)->with('msn_error', 'Hubo un error al eliminar la vacuna');;
        }
    }
}
