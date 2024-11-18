<?php

namespace App\Livewire\Visits;

use App\Http\Requests\Visit\StoreVisitRequest;
use App\Models\AppliedVaccine;
use App\Models\ClinicalHistory;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateVisit extends Component
{
    public $history;
    
    // Mis wire models
    public $heart_rate;
    public $respiratory_rate;
    public $temperature;
    public $anamnesis;
    public $symptoms;
    public $exams;
    public $differential_diagnosis;
    public $definitive_diagnosis;
    public $treatment;
    public $exam_results;
    public $recommendations;
    public $recipes;
    public $price;
    public $weight;
    public $date;
    public $time;
    
    // No son wire models
    public $clinical_history_id;
    public $vaccines = [];
    
    public function mount(ClinicalHistory $history) {
        $this->clinical_history_id = $history->id;
        $this->history = $history;
    }
    
    protected function rules() : array {
        return (new StoreVisitRequest())->rules();
    }

    public function store($vaccines) {
        $this->vaccines = $vaccines;
        $validData = $this->validate();
        
        // Agregar id de historial clinico para guardarlo
        $validData['clinical_history_id'] = $this->clinical_history_id;

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

    public function render()
    {
        return view('livewire.visits.create-visit');
    }
}
