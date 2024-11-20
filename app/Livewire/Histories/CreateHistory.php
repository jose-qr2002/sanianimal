<?php

namespace App\Livewire\Histories;
use App\Http\Requests\ClinicalHistory\StoreHistoryRequest;
use App\Models\ClinicalHistory;
use Livewire\Component;

use function PHPSTORM_META\type;

class CreateHistory extends Component
{
    public $number;
    public $pet_id;
    public $user_id;

    protected function rules(): array
    {
        return (new StoreHistoryRequest())->rules();
    }

    public function createHistory()
    {
        $validData = $this->validate();

        try {
            ClinicalHistory::create($validData);
            return redirect()->route('histories.index')->with('msn_success', 'La historia clínica se registró exitosamente');
        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: "La historia clínica no se pudo registrar", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.histories.create-history');
    }
}
