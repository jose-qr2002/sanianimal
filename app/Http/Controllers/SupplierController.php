<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruc' => 'required|digits:11|unique:suppliers,ruc',
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:9',
            'address' => 'required|string|max:255',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('msn_success', 'Proveedor registrado correctamente.');
    }
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'ruc' => 'required|digits:11|unique:suppliers,ruc,' . $supplier->id,
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:9',
            'address' => 'required|string|max:255',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('msn_success', 'Proveedor actualizado correctamente.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('msn_success', 'Proveedor eliminado correctamente.');
    }

}
