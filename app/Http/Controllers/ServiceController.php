<?php

namespace App\Http\Controllers;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(10);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }
 /**
     * Crea un nuevo registro de medicamentos en la base de datos
     * @param StoreServiceRequest $request FormRequest que valida los datos del Medicamento enviado
     */

    public function store(StoreServiceRequest $request)
    {
        $validData = $request->validated();
        try {
            Service::create($validData);
            return redirect()->route('services.index')->with('msn_success', 'El servicio fue registrado con exito');
        } catch (\Exception $e) {
            return redirect()->route('services.create')->with('msn_error', 'El servicio no fue registrado');
        }
    }

    public function show(Service $service)
    {

    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validData = $request->validated();
        try {
            $service->update($validData);
            return redirect()->route('services.index')->with('msn_success', 'El servicio se actualizo exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('services.edit', $service)->with('msn_error', 'El servicio no se logro actualizar correctamente');
        } 
    }
    
    public function destroy(Service $service)
    {

    }
}
