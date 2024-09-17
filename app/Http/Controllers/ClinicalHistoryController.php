<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClinicalHistory\StoreHistoryRequest;
use App\Models\ClinicalHistory;
use App\Models\Customer;
use Illuminate\Http\Request;

class ClinicalHistoryController extends Controller
{
    /**
     * Muestran todos los datos de historiales clinicos
     */
    public function index(){
        $histories = ClinicalHistory::paginate(10);
        return view('histories.index', compact('histories'));
    }

    /**
     * Funcion para buscar clientes en la parte de creacion de historiales clinicos
     * @param Request $request Contiene el dni que se pasa en el formulario
     */
    public function serveCustomer(Request $request) {
        if ($request->n_document) {
            $customer = Customer::where('n_document', $request->n_document)->with('pets')->first();
            if(!$customer) {
                $customer = [];
            }
            
            return view('histories.serveCustomer', compact('customer'));
        }
        

        return view('histories.serveCustomer');
    }

    /**
     * Se encargar de mostrar un formulario para registrar una historia clinica
     * @param Customer $customer Contiene todos los datos del cliente
     * @param Request $request Contiene los valores que se pasan del formulario
     */
    public function create(Customer $customer, Request $request) {
        $lastNumber = ClinicalHistory::max('number') + 1;
        return view('histories.create', compact('customer', 'lastNumber'));
    }

    /**
     * Se encarga de procesar los datos para crear un historial clinico
     * @param StoreHistoryRequest $request Contiene todos los datos enviados y los valida automaticamente
     */
    public function store(StoreHistoryRequest $request) {
        $validData = $request->validated();
        try {
            $validData['user_id'] = $request->user()->id;
            ClinicalHistory::create($validData);
            return redirect()->route('histories.index')->with('msn_success', 'La historia clinica ha sido guardada N° '.$validData['number']);
        } catch (\Exception $e) {
            return redirect()->route('histories.index')->with('msn_error', 'Ocurrió un problema al guardar la historia');
        }

    }
}
