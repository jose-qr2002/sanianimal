<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use App\Models\Supplier;

class EditSupplier extends Component
{
    public $supplier;
    public $ruc;
    public $name;
    public $phone;
    public $address;
    public $email;
    public $occupation;
    public $supplier_id;

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
        return [
            'ruc' => 'required|digits:11|unique:suppliers,ruc,' . $this->supplier->id,
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:9',
            'address' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
        ];
    }
    
    public function update() {
        $validData = $this->validate();
        try {
            $this->supplier->update($validData);

            // Forma alternativa
          session()->flash('msn_success', "El proveedor se actualizo exitosamente");
           $this->redirectRoute('suppliers.index');
           // return redirect()->route('suppliers.edit', $this->supplier->supplier_id)->with('msn_success', 'El proveedor se actualizo exitosamente');

            //return redirect()->route('customers.index')->with('msn_success', 'El cliente se actualizo exitosamente');
        } catch (\Exception $e) {
            // Emite eventos para que javascript los escuche
            Log::error($e->getMessage());
            $this->dispatch('alert-sweet', message: "No se guardo los cambios del proveedor", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.suppliers.edit-supplier');
    }
}
