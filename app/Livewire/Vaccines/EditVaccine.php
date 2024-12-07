<?php

namespace App\Livewire\Vaccines;
use App\Http\Requests\Vaccine\UpdateVaccineRequest;
use App\Models\Vaccine;
use Livewire\Component;

class EditVaccine extends Component
{
    public $vaccine;
    public $vaccines;

    public $detail;
    public $stock;
 

    public function mount(Vaccine $vaccines) {
        $this->vaccine = $vaccines->vaccine;
        $this->detail = $vaccines->detail;
        $this->stock = $vaccines->stock;
        $this->vaccines = $vaccines;

    }
    protected function rules() : array {
        return (new UpdateVaccineRequest())->rules();
    }

    public function update() {
        $validData = $this->validate();
        try {
            $this->vaccines->update($validData);

            // Forma alternativa
            session()->flash('msn_success', "La vacuna se actualizo exitosamente");
            $this->redirectRoute('vaccines.index');

            //return redirect()->route('services.index')->with('msn_success', 'El cliente se actualizo exitosamente');
        } catch (\Exception) {
            // Emite eventos para que javascript los escuche
            $this->dispatch('alert-sweet', message: "No se guardo los cambios de la vacuna", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.vaccines.edit-vaccine');
    }
}
