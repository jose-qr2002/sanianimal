<?php

namespace App\Livewire\Customers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Models\Customer;
use Livewire\Component;

use function PHPSTORM_META\type;

class CreateCustomer extends Component
{
    // Captura todos los wire:model
    public $name;
    public $lastname;
    public $n_document;
    public $phone;
    public $sex;
    public $email;
    public $birthdate;
    public $address;

    // Forma de usar un form request en livewire para traer las reglas de validación
    protected function rules() : array {
        return (new StoreCustomerRequest())->rules();
    }

    public function createCustomer() {
        $validData = $this->validate();

        // Crear al cliente
        try {
            Customer::create($validData);
            return redirect()->route('customers.index')->with('msn_success', 'El cliente se registro exitosamente');
        } catch (\Exception $e) {
            // Emite eventos para que javascript los escuche
            $this->dispatch('alert-sweet', message: "El cliente no se pudo registrar", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.customers.create-customer');
    }
}
