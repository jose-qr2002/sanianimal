<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Muestra la lista de todos los clientes
     */
    public function index(Request $request)
    {
        $customers = null;

        if ($request->parameter) {
            $searchParameter = $request->parameter;

            $customers = Customer::where('name', 'LIKE', "%$searchParameter%")
                ->orWhere('lastname', 'LIKE', "%$searchParameter%")
                ->orWhere('n_document', 'LIKE', "%$searchParameter%")
                ->orWhere('phone', 'LIKE', "%$searchParameter%")
                ->paginate(10)
                ->appends(['parameter' => $searchParameter]);
        } else {
            $customers = Customer::paginate(10);
        }

        return view('customers.index', compact('customers'));
    }

    /**
     * Muestra un formulario para crear un cliente
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Crear un registro de Cliente
     * @param StoreCustomerRequest $request Procesado todos los datos y los valida
     */
    public function store(StoreCustomerRequest $request)
    {
        // Recopila todos los datos validados
        $validData = $request->validated();
        try {
            Customer::create($validData);
            return redirect()->route('customers.index')->with('msn_success', 'El cliente se registro exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('customers.create')->with('msn_error', 'El cliente no se pudo registrar');
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
     * Muestra un formulario para editar un cliente
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Actualiza los datos de un cliente
     * @param UpdateCustomerRequest $request 
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $validData = $request->validated();
        try {
            $customer->update($validData);
            return redirect()->route('customers.index')->with('msn_success', 'El cliente se actualizo exitosamente');
        } catch (\Exception) {
            return redirect()->route('customers.edit', $customer->id)->with('msn_error', 'El Cliente no se logro actualizar correctamente');
        }
    }

    /**
     * Eliminar un registro de cliente
     * @param Customer $customer Cliente con todos sus datos
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return redirect()->route('customers.index')->with('msn_success', 'El cliente se elimino exitosamente');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('customers.index')->with('msn_error', 'El cliente tiene mascotas registradas');
            } else {
                return redirect()->route('customers.index')->with('msn_error', 'El cliente no se elimino');
            }

        } catch (\Exception $e) {
            return redirect()->route('customers.index')->with('msn_error', 'El cliente no se elimino');
        }
    }

    /**
     * Esta funcion hace una busqueda encontrando coincidencias en los nombres, apellidos y dnis del cliente
     * @param string $value Parametro para hacer la busqueda
     */
    public function search(string $value) {
        $customers = Customer::select('id','name','lastname','n_document')->whereRaw("CONCAT(name,' ',lastname, ' ', n_document) LIKE '%{$value}%'")->limit(5)->get();
        if($customers->count() < 1) {
            return response()->json(
                [
                    'type' => 'error',
                    'message' => 'No se encontraron clientes',
                    'data' => []
                ]
            );
        }

        return response()->json(
            [
                'type' => 'success',
                'message' => 'Se encontraron '.$customers->count().' clientes',
                'data' => $customers
            ]
        );
    }
}
