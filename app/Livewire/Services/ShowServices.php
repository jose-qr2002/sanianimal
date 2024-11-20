<?php

namespace App\Livewire\Services;

use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;


class ShowServices extends Component
{
    use WithPagination;

    public string $search = "";
    
    public function searching(){
        // Actualiza el livewire
    }

    #[On('deleteService')]
    public function deleteService(Service $service) {
        try {
            $service->delete();
            $this->dispatch('alert-sweet', message: "El servicio se elimino correctamente", icon: "success");
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                $this->dispatch('alert-sweet', message: "El servicio tiene mascotas registradas", icon: "error");
            } else {
                $this->dispatch('alert-sweet', message: "El servicio no se elimino", icon: "error");
            }

        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: "El servicio no se elimino", icon: "error");
        }
    }

    public function render()
    {
        $services = Service::when($this->search, function($query) {
            $query->where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('price', 'LIKE', "%{$this->search}%")
                ->orWhere('description', 'LIKE', "%{$this->search}%");
        })->paginate(10);
        return view('livewire.services.show-services', compact('services'));
    }
}
