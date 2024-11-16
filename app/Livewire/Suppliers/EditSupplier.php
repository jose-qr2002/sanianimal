<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;

use App\Http\Requests\Supplier\UpdateSupplierRequest;
use App\Models\Supplier;

class EditSupplier extends Component
{
    public $supplier;

    public $supplier_id;
    public $ruc;
    public $name;
    public $phone;
    public $address;
    public $email;
    public $occupation;

    public function mount(Supplier $supplier) {
        $this->supplier_id = $supplier->id;
        $this->ruc = $supplier->ruc;
        $this->name = $supplier->name;
        $this->phone = $supplier->phone;
        $this->address = $supplier->address;
        $this->email = $supplier->email;
        $this->occupation = $supplier->occupation;
    
        $this->supplier = $supplier;
    }

    protected function rules() : array {
        return (new UpdateSupplierRequest())->rules();
    }
    
    public function update() {
        $validData = $this->validate();
        try {
            $this->supplier->update($validData);

            // Forma alternativa
            session()->flash('msn_success', "El proveedor se actualizo exitosamente");
            $this->redirectRoute('suppliers.index');

            //return redirect()->route('customers.index')->with('msn_success', 'El cliente se actualizo exitosamente');
        } catch (\Exception) {
            // Emite eventos para que javascript los escuche
            $this->dispatch('alert-sweet', message: "No se guardo los cambios del proveedor", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.suppliers.edit-supplier');
    }
}
