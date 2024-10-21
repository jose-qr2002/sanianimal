<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pet\StorePetRequest;
use App\Http\Requests\Pet\UpdatePetRequest;
use App\Models\Pet;
use App\Models\Specie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    /**
     * Muestra todos los registros de las mascotas
     */
    public function index(Request $request) {
        // Inicializa la variable donde almacenera las mascotas
        $pets = null;

        // Verifica si se ingreso un parametro de busqueda
        if($request->parameter) {
            $searchParameter = $request->parameter;
            // Se utiliza with para eager loading, esto permite cargar antes las relaciones de cada 
            // registro de mascota y evitar caer en el problema n + 1 donde se ejecutan multiples querys 
            // relentizando la aplicacion
            $pets = Pet::with(['customer:id,name,lastname,phone', 'specie:id,specie'])
                        ->where('name', 'LIKE', "%$searchParameter%")
                        ->orWhere('color', 'LIKE', "%$searchParameter%")
                        // orWhereHas verifica primero si tiene una relacion con cliente para 
                        // comparar el parametro con los registro de cada campo de su cliente respectivo
                        // ahi se registrarn consultas where, es necesario usar un closure (funcion anonima)
                        // pasando como parametro el query y el use sirve para utilizar una variable fuera de su
                        // ambito dentro de la funcion anonima, en este caso usamos el searchparamter
                        ->orWhereHas('customer', function($query) use ($searchParameter) {
                            $query->where('name', 'LIKE', "%$searchParameter%")
                                  ->orWhere('lastname','LIKE',"%$searchParameter%")
                                  ->orWhere('n_document','LIKE',"%$searchParameter%")
                                  ->orWhere('phone', 'LIKE', "%$searchParameter%");
                        })->paginate(10)
                        // Appends es necesario para que el parametro de busqueda no se pierda  al paginar
                        ->appends(['parameter' => $searchParameter]);
        } else {
            $pets = Pet::with(['customer:id,name,lastname,phone', 'specie:id,specie'])->paginate(10);
        }
        return view('pets.index', compact('pets'));
    }

    /**
     * Muestra la informacion de una mascota
     * @param Pet $pet Se pasa un modelo de mascotas a travez de 
     * Route Model Biding
     */
    public function show(Pet $pet) {
        return view('pets.show', compact('pet'));
    }

    /**
     * Muestra un formulario para crear una mascota
     */
    public function create() {
        $species = Specie::all();
        return view('pets.create', compact('species'));
    }

    /**
     * Muestra la informacion de una mascota
     * @param StorePetRequest $request FormRequest que valida los datos de la mascota enviada
     */
    public function store(StorePetRequest $request) {
        $validData = $request->validated();
        try {
            
            // Guardamos la imagen
            if($request->file('image')){
                $image = $request->file('image');
                $fileName = $validData['name'].time().'.'.$image->getClientOriginalExtension(); 
                $path = $image->storeAs('public/images/pets', $fileName);
                $validData['image'] = $fileName;
            }
            
            Pet::create($validData);
            return redirect()->route('pets.index')->with('msn_success', 'Se registro la mascota');
        } catch (\Exception $e) {
            return redirect()->route('pets.create')->with('msn_error', 'No se logro registrar a la mascota');
        }
    }

    /**
     * Muestra un formulario para editar la mascota
     * @param Pet $pet Se pasa un modelo de mascotas a travez de 
     * Route Model Biding
     */
    public function edit(Pet $pet) {
        $species = Specie::all();
        $customer = $pet->customer;
        return view('pets.edit', compact('pet', 'species', 'customer'));
    }

    /**
     * Muestra la informacion de una mascota
     * @param Pet $pet Se pasa un modelo de mascotas a travez de 
     * Route Model Biding
     * @param UpdatePetRequest $request FormRequest que valida los datos de la mascota enviada
     */
    public function update(UpdatePetRequest $request, Pet $pet) {
        $validData = $request->validated();
        try {
            if($request->file('image')){
                // Obtiene la imagen
                $image = $request->file('image');
                // Verifica si existe la imagen
                if (Storage::disk('public')->exists('/images/pets/'.$pet->image)) {
                    // Elimina la imagen
                    Storage::disk('public')->delete('/images/pets/'.$pet->image);
                }
                // Establece un nombre para la imagen
                $fileName = $validData['name'].time().'.'.$image->getClientOriginalExtension(); 
                // Guarda la imagen
                Storage::disk('public')->putFileAs('images/pets', $image, $fileName);
                // Cambia el valor de la imagen
                $validData['image'] = $fileName;
            }
            
            $pet->update($validData);
            return redirect()->route('pets.index')->with('msn_success', 'La mascota se actualizo exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('pets.edit', $pet->id)->with('msn_error', 'La mascota no se logro actualizar correctamente');
        }
    }

    /**
     * Elimina un registro de mascotas
     * @param Pet $pet Se pasa un modelo de mascotas a travez de 
     * Route Model Biding
     */
    public function destroy(Pet $pet)
    {
        try {
            $pet->delete();
            // Eliminar la imagen que contenga
            if($pet->image && Storage::disk('public')->exists("images/pets/{$pet->image}")) {
                Storage::disk('public')->delete("images/pets/{$pet->image}");
            }
            return redirect()->route('pets.index')->with('msn_success', 'La mascota se eliminó correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('pets.index')->with('msn_error', 'La mascota no se eliminó');
        }
    }
}
