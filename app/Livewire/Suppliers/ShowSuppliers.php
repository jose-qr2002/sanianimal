<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;

use App\Models\Supplier;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ShowSuppliers extends Component
{
    use WithPagination;

    public string $search = "";
    
    public function searching(){
        // Actualiza el livewire
    }
/*
    #[On('deleteSupplier')]
    public function deleteSupplier(Supplier $supplier) {
        try {
            $supplier->delete();
            $this->dispatch('alert-sweet', message: "El proveedor se elimino correctamente", icon: "success");
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                $this->dispatch('alert-sweet', message: "El proveedor tiene mascotas registradas", icon: "error");
            } else {
                $this->dispatch('alert-sweet', message: "El proveedor no se elimino", icon: "error");
            }

        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: "El proveedor no se elimino", icon: "error");
        }
    }
*/
    public function render()
    {
        $suppliers = Supplier::when($this->search, function($query) {
            $query->where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('ruc', 'LIKE', "%{$this->search}%")
                ->orWhere('address', 'LIKE', "%{$this->search}%")
                ->orWhere('phone', 'LIKE', "%{$this->search}%")
                ->orWhere('email', 'LIKE', "%{$this->search}%")
                ->orWhere('occupation', 'LIKE', "%{$this->search}%");
        })->paginate(10);
        return view('livewire.suppliers.show-suppliers', compact('suppliers'));
    }
}
