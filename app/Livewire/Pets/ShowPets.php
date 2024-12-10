<?php

namespace App\Livewire\Pets;

use Livewire\Component;
use App\Models\Pet;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ShowPets extends Component
{
    use WithPagination;

    public string $search = "";
    
    public function searching(){
        // Actualiza el livewire
    }

    #[On('deleteCustomer')]
    public function deletePet(Pet $pet) {
        try {
            $pet->delete();
            $this->dispatch('alert-sweet', message: "La mascota se elimino correctamente", icon: "success");
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                $this->dispatch('alert-sweet', message: "La mascota se esta utilizando en otro lado", icon: "error");
            } else {
                $this->dispatch('alert-sweet', message: "La mascota no se elimino", icon: "error");
            }

        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: "La mascota no se elimino", icon: "error");
        }
    }

    public function render()
    {
        $pets = Pet::when($this->search, function($query) {
            $query->where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('sex', 'LIKE', "%{$this->search}%")
                ->orWhere('color', 'LIKE', "%{$this->search}%")
                ->orWhere('pedigree', 'LIKE', "%{$this->search}%")
                ->orWhere('race', 'LIKE', "%{$this->search}%")
                ->orWhereHas('customer', function ($q) { 
                    $q->where('name', 'LIKE', "%{$this->search}%")
                      ->orWhere('lastname', 'LIKE', "%{$this->search}%");
                })
                ->orWhereHas('specie', function ($q) {
                    $q->where('specie', 'LIKE', "%{$this->search}%");
                });
        })->paginate(10);
        return view('livewire.pets.show-pets',compact('pets'));
    }
}
