<?php

namespace App\Livewire\Visits\AppliedVaccines;

use App\Http\Requests\AppliedVaccine\UpdateAppliedVaccineRequest;
use App\Models\AppliedVaccine;
use App\Models\Vaccine;
use Livewire\Component;

class EditAppliedVaccine extends Component
{
    public $appliedVaccine;

    public $vaccine_id;
    public $observation;

    public function mount(AppliedVaccine $appliedVaccine) {
        $this->vaccine_id = $appliedVaccine->vaccine_id;
        $this->observation = $appliedVaccine->observation;

        $this->appliedVaccine = $appliedVaccine;
    }

    public function rules() : array {
        return (new UpdateAppliedVaccineRequest())->rules();
    }

    public function update() {
        $validData = $this->validate();
        try {
            $this->appliedVaccine->update($validData);
            return redirect()->route('visits.edit', $this->appliedVaccine->visit_id)->with('msn_success', 'La vacuna se actualizo correctamente');
        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message:'Hubo un error al actualizar la vacuna', icon:'error');
        }
    }

    public function render()
    {
        $vaccines = Vaccine::all();
        return view('livewire.visits.applied-vaccines.edit-applied-vaccine', compact('vaccines'));
    }
}
