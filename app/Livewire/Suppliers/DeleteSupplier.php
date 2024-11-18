<?php

namespace App\Livewire\Suppliers;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Supplier;
use Livewire\Attributes\On;
use Illuminate\Database\QueryException;

class DeleteSupplier extends Component
{
    use WithPagination;

    public string $search = "";
    
    public function searching(){
        // Actualiza el livewire
    }

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

    #[On('deleteSupplier')]
    public function deleteSupplier(Supplier $supplier) {
        try {
            $supplier->delete();
           return redirect()->route('suppliers.index')->with('msn_success', 'Proveedor eliminado correctamente.');


        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: "El proveedor no se elimino", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.suppliers.delete-supplier');
    }
}
