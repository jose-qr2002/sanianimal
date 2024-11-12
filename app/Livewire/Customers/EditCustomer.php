<?php

namespace App\Livewire\Customers;

use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use Livewire\Component;

class EditCustomer extends Component
{
    public $customer;

    public $customer_id;
    public $name;
    public $lastname;
    public $n_document;
    public $phone;
    public $sex;
    public $email;
    public $birthdate;
    public $address;

    public function mount(Customer $customer) {
        $this->customer_id = $customer->id;
        $this->name = $customer->name;
        $this->lastname = $customer->lastname;
        $this->n_document = $customer->n_document;
        $this->phone = $customer->phone;
        $this->sex = $customer->sex;
        $this->email = $customer->email;
        $this->birthdate = $customer->birthdate?->toDateString(); // Solo para fechas
        $this->address = $customer->address;

        $this->customer = $customer;
    }

    // Forma de usar un form request en livewire para traer las reglas de validación
    protected function rules() : array {
        return (new UpdateCustomerRequest())->rules();
    }

    public function update() {
        $validData = $this->validate();
        try {
            $this->customer->update($validData);

            // Forma alternativa
            session()->flash('msn_success', "El cliente se actualizo exitosamente");
            $this->redirectRoute('customers.index');

            //return redirect()->route('customers.index')->with('msn_success', 'El cliente se actualizo exitosamente');
        } catch (\Exception) {
            // Emite eventos para que javascript los escuche
            $this->dispatch('alert-sweet', message: "No se guardo los cambios del cliente", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.customers.edit-customer');
    }
}
