<?php

namespace App\Livewire\Sales;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSales extends Component
{
    use WithPagination;

    public string $search = "";

    public function searching(){
        // Actualiza el livewire
    }

    public function render()
    {
        $sales = Sale::with(['customer:id,name,lastname,phone'])
            ->when($this->search, function($query) {
                $query->where('total', 'LIKE', "%{$this->search}%")
                ->orWhereHas('customer', function($query) {
                    $query->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('lastname', 'LIKE', "%{$this->search}%")
                    ->orWhere('n_document', 'LIKE', "%{$this->search}%")
                    ->orWhere('phone', 'LIKE', "%{$this->search}%");
                });
            })->orderBy('date','DESC')->paginate(10);
        return view('livewire.sales.show-sales', compact('sales'));
    }
}
