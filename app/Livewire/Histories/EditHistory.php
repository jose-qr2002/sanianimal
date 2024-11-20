<?php

namespace App\Livewire\Histories;
use App\Http\Requests\ClinicalHistory\UpdateHistoryRequest;
use App\Models\ClinicalHistory;
use Livewire\Component;

class EditHistory extends Component
{
    public $history;

    public $history_id;
    public $number;
    public $pet;
    public $user_id;

    public function mount(ClinicalHistory $history)
    {
        $this->history_id = $history->id;
        $this->number = $history->number;
        $this->pet = $history->pet;
        $this->user_id = $history->user_id;
        $this->history = $history;
    }

    protected function rules(): array
    {
        return [
            'number' => ['required', 'integer', 'min:1', 'unique:clinical_histories,number,' . $this->history->id],
        ];
    }

    public function update()
    {
        $validData = $this->validate();

        try {
            $this->history->update($validData);
            session()->flash('msn_success', "La historia clínica se actualizó exitosamente");
            $this->redirectRoute('histories.index');
        } catch (\Exception) {
            $this->dispatch('alert-sweet', message: "No se guardaron los cambios de la historia clínica", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.histories.edit-history');
    }
}
