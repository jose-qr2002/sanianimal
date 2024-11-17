<?php

namespace App\Livewire\Visits;

use App\Models\ClinicalHistory;
use App\Models\Visit;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowVisits extends Component
{

    public $history;

    public function mount(ClinicalHistory $history) {
        $this->history = $history;
    }

    #[On('deleteVisit')]
    public function deleteVisit(Visit $visit) {
        try {
            $visit->delete();
            $this->dispatch('alert-sweet', message: 'La visita se elimino correctamente', icon:'success');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                $this->dispatch('alert-sweet', message: 'La visita contiene vacunas aplicadas', icon:'error');
            } else {
                $this->dispatch('alert-sweet', message: 'Hubo un error al eliminar la vacuna', icon:'error');
            }

        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: 'Hubo un error al eliminar la vacuna', icon:'error');
        }
    }
    

    public function render()
    {
        return view('livewire.visits.show-visits');
    }
}
