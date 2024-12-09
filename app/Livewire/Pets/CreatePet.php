<?php

namespace App\Livewire\Pets;

use Livewire\Component;
use App\Models\Pet;
use App\Models\Specie;
use App\Models\Customer; 
use Livewire\WithFileUploads;
use App\Http\Requests\Pet\StorePetRequest;

class CreatePet extends Component
{
    use WithFileUploads;

    public $name;
    public $specie_id="";
    public $color;
    public $birthdate;
    public $sex="";
    public $pedigree="";
    public $customer_id; // ID del dueño
    public $image;
    public $race;
    public $errorMessage = ''; // Mensaje de error si el documento no es válido
    public $n_document;
    public $customer_name; // Nombre del cliente
    public $customer_lastname; // Apellido del cliente
   
   
    protected function rules(): array
    {
        return [
            'name' => ['required'],
            'sex' => ['required','in:Macho,Hembra,Indefinido'],
            'birthdate' => ['nullable','date'],
            'pedigree' => ['required','boolean'],
            'specie_id' => ['required','integer','exists:species,id'],
            'customer_id' => ['required','integer','exists:customers,id'],
            'color' => ['nullable','string'],
            'race' => ['nullable','string'],
            'image' => ['nullable','image','mimes:png,jpg,png,jpeg','max:2048']
        ];
    }   

    public function createPet()
    {
        $customer = Customer::where('n_document', $this->n_document)->first();

        if ($customer) {
            $this->customer_id = $customer->id;
            $this->customer_name = $customer->name; // Asigna el nombre
            $this->customer_lastname = $customer->lastname; // Asigna el apellido
            $this->errorMessage = ''; // Limpiar el mensaje de error si se encuentra
        } else {
            $this->customer_id = null;
            $this->customer_name = null;
            $this->customer_lastname = null;
            $this->errorMessage = 'No se encontró un cliente con este documento.';
        }

        $validData = $this->validate();

        
        if ($this->image) {
            $imageName = $this->name . time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/pets', $imageName); // Guardar la imagen
        }


        try {
            // Crear una nueva mascota
        Pet::create([
            'name' => $this->name,
            'specie_id' => $this->specie_id,
            'color' => $this->color,
            'birthdate' => $this->birthdate,
            'sex' => $this->sex,
            'pedigree' => $this->pedigree,
            'race' => $this->race,
            'customer_id' => $this->customer_id,
            'image' => isset($imageName) ? $imageName : null, // Guardar la imagen
        ]);
            return redirect()->route('pets.index')->with('msn_success', 'La mascota se registró exitosamente');
        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: "No se pudo registrar la mascota", icon: "error");
        }
    }

    public function render()
    {
        $species = Specie::all();
        return view('livewire.pets.create-pet', compact('species'));
    }
   


}
