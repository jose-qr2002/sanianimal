<?php

namespace App\Livewire\Services;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Models\Service;
use Livewire\Component;

class EditService extends Component
{

    public $service;

    public $service_id;
    public $name;
    public $price;
    public $description;
 

    public function mount(Service $service) {
        $this->service_id = $service->id;
        $this->name = $service->name;
        $this->price = $service->price;
        $this->description = $service->description;
        $this->service = $service;
    }

    // Forma de usar un form request en livewire para traer las reglas de validación
    protected function rules() : array {
        return (new UpdateServiceRequest())->rules();
    }

    public function update() {
        $validData = $this->validate();
        try {
            $this->service->update($validData);

            // Forma alternativa
            session()->flash('msn_success', "El servicio se actualizo exitosamente");
            $this->redirectRoute('services.index');

            //return redirect()->route('services.index')->with('msn_success', 'El cliente se actualizo exitosamente');
        } catch (\Exception) {
            // Emite eventos para que javascript los escuche
            $this->dispatch('alert-sweet', message: "No se guardo los cambios del servicio", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.services.edit-service');
    }
}
