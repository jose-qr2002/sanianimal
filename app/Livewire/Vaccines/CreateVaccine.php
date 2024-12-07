<?php

namespace App\Livewire\Vaccines;

use Livewire\Component;

class CreateVaccine extends Component
{
    public $vaccine;
    public $stock;
    public $detail;

    protected function rules() : array {
        return (new StoreVaccineRequest())->rules();
    }

    public function createVaccine() {
        $validData = $this->validate();

        // Crear al cliente
        try {
            Vaccine::create($validData);
            return redirect()->route('customers.index')->with('msn_success', 'El cliente se registro exitosamente');
        } catch (\Exception $e) {
            // Emite eventos para que javascript los escuche
            $this->dispatch('alert-sweet', message: "El cliente no se pudo registrar", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.vaccines.create-vaccine');
    }
}
