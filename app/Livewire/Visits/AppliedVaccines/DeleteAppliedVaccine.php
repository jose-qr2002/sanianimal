<?php

namespace App\Livewire\Visits\AppliedVaccines;

use App\Models\AppliedVaccine;
use App\Models\Visit;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteAppliedVaccine extends Component
{
    public $appliedVaccine;
    public $visit;

    public function mount(AppliedVaccine $appliedVaccine, Visit $visit) {
        $this->appliedVaccine = $appliedVaccine;
        $this->visit = $visit;
    }

    #[On('deleteAppliedVaccine')]
    public function deleteAppliedVaccine() {
        try {
            $this->visit->vaccines()->detach($this->appliedVaccine->vaccine_id);
            return redirect()->route('visits.edit', $this->visit)->with('msn_success', 'La vacuna se elimino exitosamente');
        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message:'Hubo un error al eliminar la vacuna aplicada', icon:'error');
        }
    }

    public function render()
    {
        return view('livewire.visits.applied-vaccines.delete-applied-vaccine');
    }
}
