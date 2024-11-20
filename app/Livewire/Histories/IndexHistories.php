<?php

namespace App\Livewire\Histories;
use App\Models\ClinicalHistory;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Database\QueryException;

class IndexHistories extends Component
{
    use WithPagination;

    public string $search = "";
    protected $queryString = ['search']; // Para mantener la búsqueda en la URL

    public function updatingSearch()
    {
        // Resetea la paginación cuando el usuario busca
        $this->resetPage();
    }
    
    public function searching()
    {
        // Actualiza el Livewire
    }

    public function render()
    {
        $histories = ClinicalHistory::select('id', 'number', 'pet_id')
            ->with(['pet:id,name,customer_id', 'pet.customer:id,name,lastname'])
            ->when($this->search, function ($query) {
                $query->where('number', 'LIKE', "%{$this->search}%")
                    ->orWhereHas('pet', function ($query) {
                        $query->where('name', 'LIKE', "%{$this->search}%");
                    })
                    ->orWhereHas('pet.customer', function ($query) {
                        $query->where('name', 'LIKE', "%{$this->search}%")
                            ->orWhere('lastname', 'LIKE', "%{$this->search}%")
                            ->orWhere('phone', 'LIKE', "%{$this->search}%");
                    });
            })
            ->paginate(10);

        return view('livewire.histories.index-histories', compact('histories'));
    }
}
