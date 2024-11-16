<?php

namespace App\Livewire\Services;

use App\Http\Requests\Service\StoreServiceRequest;
use App\Models\Service;
use Livewire\Component;

use function PHPSTORM_META\type;

class CreateService extends Component
{
    public $name;
    public $description;
    public $price;

    protected function rules() : array {
        return (new StoreServiceRequest())->rules();
    }

    public function createService() {
        $validData = $this->validate();

        // Crear al cliente
        try {
            Service::create($validData);
            return redirect()->route('services.index')->with('msn_success', 'El servicio se registro exitosamente');
        } catch (\Exception $e) {
            // Emite eventos para que javascript los escuche
            $this->dispatch('alert-sweet', message: "El servicio no se pudo registrar", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.services.create-service');
    }
}
