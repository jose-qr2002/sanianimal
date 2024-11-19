<?php

namespace App\Livewire\Products;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ShowProducts extends Component
{
    use WithPagination;

    public string $search = "";
    public function searching(){
        // Actualiza el livewire
    }

    #[On('deleteProduct')]
    public function deleteProduct(Product $products) {
        try {
            $products->delete();
            $this->dispatch('alert-sweet', message: "El producto se elimino correctamente", icon: "success");
        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: "El producto no se elimino", icon: "error");
        }
    }

    public function render()
    {
        $products = Product::when($this->search, function($query) {
            $query->where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('brand', 'LIKE', "%{$this->search}%")
                ->orWhere('stock', 'LIKE', "%{$this->search}%")
                ->orWhere('price', 'LIKE', "%{$this->search}%");
        })->paginate(10);
        return view('livewire.products.show-products', compact('products'));
    }
}
