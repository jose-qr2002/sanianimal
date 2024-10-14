<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppliedVaccine\UpdateAppliedVaccineRequest;
use App\Models\AppliedVaccine;
use App\Models\Vaccine;
use App\Models\Visit;

class AppliedVaccineController extends Controller
{
    public function edit(Visit $visit, AppliedVaccine $appliedVaccine) {
        $vaccines = Vaccine::all();
        return view('visits.applied_vaccines.edit', compact('appliedVaccine', 'vaccines', 'visit'));
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
}
