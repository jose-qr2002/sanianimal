<?php

namespace App\Livewire\Vaccines;

use Livewire\Component;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\Vaccine;

class IndexVaccines extends Component
{
    use WithPagination;

    public string $search = "";
    
    public function searching(){
        // Actualiza el livewire
    }

    #[On('deleteVaccine')]
    public function deleteVaccine(Vaccine $vaccine) {
        try {
            $vaccine->delete();
            $this->dispatch('alert-sweet', message: "La vacuna se elimino correctamente", icon: "success");
        }catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                $this->dispatch('alert-sweet', message: "La vacuna se esta utilizando en otro lado", icon: "error");
            } else {
                $this->dispatch('alert-sweet', message: "La vacuna no se elimino", icon: "error");
            }

        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: "La vacuna no se elimino", icon: "error");
        }
    }

    public function render()
    {
        $vaccines = Vaccine::when($this->search, function($query) {
            $query->where('vaccine', 'LIKE', "%{$this->search}%")
                ->orWhere('stock', 'LIKE', "%{$this->search}%")
                ->orWhere('detail', 'LIKE', "%{$this->search}%");
        })->paginate(10);
        return view('livewire.vaccines.index-vaccines', compact('vaccines'));
    }
}
