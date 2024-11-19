<?php

namespace App\Livewire\Products;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;
use App\Rules\OptionalDecimal;


class EditProduct extends Component
{
    public $product;

    public $code;
    public $name;
    public $stock;
    public $price;
    public $measurement;
    public $brand;
    public $category_id;
    public $supplier_id;
    public $description;

    public $categories;
    public $suppliers;

    public function mount(Product $product)
    {
        // Carga inicial de datos
        $this->product = $product;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->stock = $product->stock;
        $this->price = $product->price;
        $this->measurement = $product->measurement;
        $this->brand = $product->brand;
        $this->category_id = $product->category_id;
        $this->supplier_id = $product->supplier_id;
        $this->description = $product->description;

        // Carga de categorías y proveedores
        $this->categories = Category::all();
        $this->suppliers = Supplier::all();
    }

    protected function rules()
    {
        return [
            'code' => ['nullable','string','alpha_num','unique:products,code,'. $this->product->id],
            'name' => ['required'],
            'stock' => ['required','integer','min:0'],
            'price' => ['required','numeric','min:0.10', new OptionalDecimal],
            'measurement' => ['required', 'in:units,mi,grams'],
            'brand' => ['nullable'],
            'category_id' => ['nullable', 'integer'],
            'supplier_id' => ['nullable','integer'],
            'description' => ['nullable','max:1000'],
        ];
    }

    public function update()
    {
        $validatedData = $this->validate();

        try {
            $this->product->update($validatedData);

            session()->flash('msn_success', 'El producto se actualizó exitosamente');
            $this->redirectRoute('products.index');
        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: 'No se logró actualizar el producto', icon: 'error');
        }
    }

    public function render()
    {
        return view('livewire.products.edit-product');
    }
}
