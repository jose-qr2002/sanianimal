<?php

namespace App\Http\Controllers;

use App\Models\ClinicalHistory;
use App\Models\Pet;
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
    public function create(Request $request) {
        if ($request->searchParameter) {
            $pet = Pet::where('name', $request->searchParameter)->first();
            if(!$pet) {
                $pet = [];
            }
            
            return view('histories.create', compact('pet'));
        }
        
        return view('histories.create');
    }

    public function store(Pet $pet) {
        if(!$pet->historie()->exists()) {
            $lastNumber = ClinicalHistory::max('number');
        }
        return redirect()->route('visits.create', $pet->historie->id);
    }
}
