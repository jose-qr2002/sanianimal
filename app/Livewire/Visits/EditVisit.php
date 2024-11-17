<?php

namespace App\Livewire\Visits;

use App\Http\Requests\Visit\UpdateVisitRequest;
use App\Models\Visit;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditVisit extends Component
{
    // Mi modelo visita
    public $visit;
    
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

    public function mount(Visit $visit) {
        $this->visit = $visit;

        $this->weight = $visit->weight;
        $this->heart_rate = $visit->heart_rate;
        $this->respiratory_rate = $visit->respiratory_rate;
        $this->temperature = $visit->temperature;
        $this->anamnesis = $visit->anamnesis;
        $this->symptoms = $visit->symptoms;
        $this->exams = $visit->exams;
        $this->differential_diagnosis = $visit->differential_diagnosis;
        $this->definitive_diagnosis = $visit->definitive_diagnosis;
        $this->treatment = $visit->treatment;
        $this->exam_results = $visit->exam_results;
        $this->recommendations = $visit->recommendations;
        $this->recipes = $visit->recipes;
        $this->price = $visit->price;
        $this->date = $visit->date->toDateString();
        $this->time = $visit->time;
    }

    public function rules() : array {
        return (new UpdateVisitRequest())->rules();
    }

    public function update() {
        $validData = $this->validate();
        try {
            $this->visit->update($validData);
            return redirect()->route('histories.index')->with('msn_success', 'La visita ha sido actualizada');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('alert-sweet', message: "No se guardo los cambios de la visita", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.visits.edit-visit');
    }
}
