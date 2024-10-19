<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClinicalHistory\StoreHistoryRequest;
use App\Http\Requests\ClinicalHistory\UpdateHistoryRequest;
use App\Models\ClinicalHistory;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicalHistoryController extends Controller
{
    /**
     * Muestran todos los datos de historiales clinicos
     */
    public function index(Request $request){
        $histories = null;
        if($request->parameter) {
            $searchParameter = $request->parameter;
            $histories = ClinicalHistory::select('id','number','pet_id')
                    ->with(['pet:id,name,customer_id', 'pet.customer:id,name,lastname'])
                    ->where('number', 'LIKE', "%$searchParameter%")
                    ->orWhereHas('pet', function ($query) use ($searchParameter) {
                        $query->where('name', 'LIKE', "%$searchParameter%");
                    })
                    ->orWhereHas('pet.customer', function($query) use ($searchParameter) {
                        $query->where('name', 'LIKE', "%$searchParameter%")
                                ->orWhere('lastname', 'LIKE', "%$searchParameter%")
                                ->orWhere('phone', 'LIKE', "%$searchParameter%");
                    })
                    ->paginate(10)->appends(['parameter' => $searchParameter]);;
        } else {
            $histories = ClinicalHistory::select('id','number','pet_id')
                ->with(['pet:id,name,customer_id', 'pet.customer:id,name,lastname'])->paginate(10);
        }
        return view('histories.index', compact('histories'));
    }

    public function show(ClinicalHistory $history) {
        return view('histories.show', compact('history'));
    }

    /**
     * Funcion para buscar clientes en la parte de creacion de historiales clinicos
     * @param Request $request Contiene el dni que se pasa en el formulario
     */
    public function serve(Request $request) {
        DB::enableQueryLog();
        if ($request->searchParameter) {
            $searchParameter = $request->searchParameter;
            // BUILD QUERY PARA OBTENER LAS MASCOTAS CON SU CLIENTES Y SU HISTORIA
            $pets = Pet::with(['customer:id,name,lastname,phone', 'historie:id,pet_id,number', 'specie:id,specie'])
                ->where('name', 'like', "%$searchParameter%")
                ->orWhereHas('customer', function ($query) use ($searchParameter) {
                    $query->where('name', 'like', "%$searchParameter%") 
                        ->orWhere('lastname', 'like', "%$searchParameter%"); 
                })
                ->get(['id', 'name', 'sex','customer_id','specie_id']);

            
            if(!$pets) {
                $pets = [];
            }
            return view('histories.serve', compact('pets'));
        }
        
        return view('histories.serve');
    }

    public function create(Pet $pet) {
        if($pet->historie) {
            return redirect()->route('histories.index')->with('msn_warning', 'No se puede crear una historia clinica repetida');
        }

        $lastNumber = ClinicalHistory::max('number') + 1;
        $pet->load(['customer:id,name,lastname,phone','specie:id,specie']);
        return view('histories.create', compact('pet', 'lastNumber'));
    }

    public function store(StoreHistoryRequest $request) {
        $validData = $request->validated();
        $validData['user_id'] = auth()->user()->id;
        try {
            $history = ClinicalHistory::create($validData);
            return redirect()->route('visits.create', $history->id)->with('msn_success', 'La historia clinica fue creada con exito');
        } catch (\Exception $e) {
            return redirect()->route('histories.index')->with('msn_error', 'Ocurrio un error: La historia clinica no fue creada');
        }
    }

    public function edit(ClinicalHistory $history) {
        return view('histories.edit', compact('history'));
    }

    public function update(UpdateHistoryRequest $request, ClinicalHistory $history) {
        
        $validData = $request->validated();
        try {
            $history->update($validData);
            return redirect()->route('histories.index')->with('msn_success', 'La historia clinica fue actualizada con exito');
        } catch (\Exception $e) {
            return redirect()->route('histories.index')->with('msn_error', 'Hubo un error al actualizar la historia clinica');
        }
    }

    public function destroy(ClinicalHistory $history) {
        try {
            $history->delete();
            return redirect()->route('histories.index')->with('msn_success', 'La historia clinica se elimino correctamente');
        } catch (\Exception $e) {
            return redirect()->route('histories.index')->with('msn_error', 'Hubo un error al eliminar la historia clinica');
        }
    }

}
