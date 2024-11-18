<?php

namespace App\Livewire\Suppliers;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Models\Supplier;
use Livewire\Component;

class CreateSupplier extends Component
{
    public $ruc;
    public $name;
    public $phone;
    public $address;
    public $email;
    public $occupation;


    // Forma de usar un form request en livewire para traer las reglas de validación
    protected function rules() : array {
        return (new StoreSupplierRequest())->rules();
    }

    public function createSupplier() {
        $validData = $this->validate();

        // Crear al cliente
        try {
            Supplier::create($validData);
            return redirect()->route('suppliers.index')->with('msn_success', 'El proveedor se registro exitosamente');
        } catch (\Exception $e) {
            // Emite eventos para que javascript los escuche
            $this->dispatch('alert-sweet', message: "El proveedor no se pudo registrar", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.suppliers.create-supplier');
    }
}
