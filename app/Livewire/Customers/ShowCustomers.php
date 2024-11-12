<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCustomers extends Component
{
    use WithPagination;

    public string $search = "";
    
    public function searching(){
        // Actualiza el livewire
    }

    #[On('deleteCustomer')]
    public function deleteCustomer(Customer $customer) {
        try {
            $customer->delete();
            $this->dispatch('alert-sweet', message: "El cliente se elimino correctamente", icon: "success");
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                $this->dispatch('alert-sweet', message: "El cliente tiene mascotas registradas", icon: "error");
            } else {
                $this->dispatch('alert-sweet', message: "El cliente no se elimino", icon: "error");
            }

        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: "El cliente no se elimino", icon: "error");
        }
    }

    public function render()
    {
        $customers = Customer::when($this->search, function($query) {
            $query->where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('lastname', 'LIKE', "%{$this->search}%")
                ->orWhere('n_document', 'LIKE', "%{$this->search}%")
                ->orWhere('phone', 'LIKE', "%{$this->search}%");
        })->paginate(10);
        return view('livewire.customers.show-customers', compact('customers'));
    }
}
