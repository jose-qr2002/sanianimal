<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra una vista con todos los registros de los medicamentos
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('brand', 'like', "%{$search}%")
                         ->orWhere('price', 'like', "%{$search}%");
        })->paginate(10);

        return view('products.index', compact('products', 'search'));
    }

    /**
     * Muestra un formulario para crear una vacuna
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Crea un nuevo registro de medicamentos en la base de datos
     * @param StoreProductRequest $request FormRequest que valida los datos del Productos enviados
     */
    public function store(StoreProductRequest $request)
    {
        // Recupera los datos que han sido validados
        $validData = $request->validated();
        try {
            Product::create($validData);
            return redirect()->route('products.index')->with('msn_success', 'El producto fue registrado con exito');
        } catch (\Exception $e) {
            return redirect()->route('products.create')->with('msn_error', 'El producto no fue registrado');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Muestra un formulario para registrar medicamentos
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Crea un nuevo registro de medicamentos en la base de datos
     * @param UpdateProductRequest $request FormRequest que valida los datos del Medicamento enviado
     * @param Product $medication Modelo de Medicamento, se pasa automaticamente
     * bajo la tecnica de Route Model Biding
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Recupera los datos que han sido validados
        $validData = $request->validated();
        try {
            $product->update($validData);
            return redirect()->route('products.index')->with('msn_success', 'El producto se actualizo exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('products.edit', $product)->with('msn_error', 'El producto no se logro actualizar correctamente');
        }
    }

    /**
     * Elimina un registro de productos
     * @param Product $medication Modelo de Producto, se pasa automaticamente
     * bajo la tecnica de Route Model Biding
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with('msn_success', 'El producto se elimino correctamente');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('msn_error', 'El producto no se elimino');
        }
    }
}
