<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use App\Http\Requests\Supplier\StoreVaccineRequest;
use App\Http\Requests\Supplier\UpdateVaccineRequest;


class VaccineController extends Controller
{
    /**
     * Muestra todo los registros de vacunas en formato json
     */

    public function index(Request $request)
    {
        $search = $request->input('search');
 
        $vaccines = Vaccine::when($search, function ($query, $search) {
            return $query->where('vaccine', 'like', "%{$search}%")
                         ->orWhere('stock', 'like', "%{$search}%")
                         ->orWhere('detail', $search);
        })->paginate(10);
 
        return view('vaccines.index', compact('vaccines', 'search'));
    }

    public function create()
    {
        return view('vaccines.create');
    }
 /**
     * Crea un nuevo registro de medicamentos en la base de datos
     * @param StoreVaccineRequest $request FormRequest que valida los datos del Medicamento enviado
     */

    public function store(StoreVaccineRequest $request)
    {
        $validData = $request->validated();
        try {
            Vaccine::create($validData);
            return redirect()->route('vaccines.index')->with('msn_success', 'La vacuna fue registrada con exito');
        } catch (\Exception $e) {
            return redirect()->route('vaccines.create')->with('msn_error', 'La vacuna no fue registrada');
        }
    }

    public function edit(Vaccine $vaccine)
    {
        return view('vaccines.edit', compact('vaccine'));
    }

    public function update(UpdateVaccineRequest $request, Vaccine $vaccine)
    {
        $validData = $request->validated();
        try {
            $vaccine->update($validData);
            return redirect()->route('vaccines.index')->with('msn_success', 'La vacuna se actualizo exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('vaccines.edit', $vaccine)->with('msn_error', 'La vacuna no se logro actualizar correctamente');
        } 
    }
}
