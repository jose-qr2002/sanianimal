<?php

namespace App\Livewire\Visits\AppliedVaccines;

use App\Http\Requests\AppliedVaccine\StoreAppliedVaccineRequest;
use App\Models\Vaccine;
use App\Models\Visit;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateAppliedVaccine extends Component
{
    public $visit;

    public $vaccine_id = '';
    public $observation;

    public function mount(Visit $visit) {
        $this->visit = $visit;
    }

    public function rules() : array {
        return (new StoreAppliedVaccineRequest())->rules();
    }

    public function store() {
        $validData = $this->validate();
        try {
            $this->visit->vaccines()->attach($validData['vaccine_id'],
                                            [
                                                'observation' => $validData['observation'],
                                                'date' => $this->visit->date,
                                                'time' => $this->visit->time
                                            ]);
            return redirect()->route('visits.edit', $this->visit)->with('msn_success', 'La vacuna aplicada se registro exitosamente');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('sweet-alert', message: 'Hubo un error al registrar la vacuna aplicada', icon:'error');
        }
    }

    public function render()
    {
        $vaccines = Vaccine::all();
        return view('livewire.visits.applied-vaccines.create-applied-vaccine', compact('vaccines'));
    }
}
