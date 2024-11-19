<?php

namespace App\Livewire\Products;
use App\Http\Requests\Product\StoreProductRequest;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class CreateProduct extends Component
{
    public $code;
    public $name;
    public $stock;
    public $price;
    public $measurement="";
    public $brand;
    public $category_id;
    public $supplier_id;
    public $description;

    public $categories = [];
    public $suppliers = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->suppliers = Supplier::all();
    }
    // Forma de usar un form request en livewire para traer las reglas de validación
    protected function rules() : array {
        return (new StoreProductRequest())->rules();
    }

    public function createProduct() {
        $validData = $this->validate();

        // Crear al cliente
        try {
            Product::create($validData);
            return redirect()->route('products.index')->with('msn_success', 'El producto se registro exitosamente');
        } catch (\Exception $e) {
            // Emite eventos para que javascript los escuche
            $this->dispatch('alert-sweet', message: "El producto no se pudo registrar", icon: "error");
        }
    }

    public function render()
    {
        return view('livewire.products.create-product', [
            'categories' => $this->categories,
            'suppliers' => $this->suppliers,
        ]);
    }
}
