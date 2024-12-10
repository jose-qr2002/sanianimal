<?php

namespace App\Livewire\Pets;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pet;
use App\Models\Specie;
use App\Models\Customer;

class EditPet extends Component
{
    use WithFileUploads;

    public $pet;
    public $name;
    public $sex;
    public $color;
    public $specie_id;
    public $race;
    public $pedigree;
    public $birthdate;
    public $image;
    public $customer_id;
   // public $customer;
    public $customerSearch;
    public $n_document;
    public $customer_name; // Nombre del cliente
    public $customer_lastname; // Apellido del cliente
    public $errorMessage = ''; 
    public $imagePreview='';

    public function mount(Pet $pet)
    {
        $this->pet = $pet;
        $this->name = $pet->name;
        $this->sex = $pet->sex;
        $this->color = $pet->color;
        $this->specie_id = $pet->specie_id;
        $this->race = $pet->race;
        $this->pedigree = $pet->pedigree;
        $this->birthdate = $pet->birthdate ? $pet->birthdate->toDateString() : '';
        $this->customer_id = $pet->customer_id;
      //  $this->image = $pet->image ? asset('public/images/pets/' . $pet->image) : null;
      // Aquí solo asigna si la imagen existe en la base de datos
    if ($pet->image) {
        $this->imagePreview = asset('storage/images/pets/' . $pet->image); // Ruta completa para previsualización
    }
       // $this->customerSearch = $pet->customer ? $pet->customer->name . ' ' . $pet->customer->lastname : '';
        $this->customerSearch = $pet->customer ? $pet->customer->n_document : '';
    }

    protected function rules()
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

    public function updatePet()
    {
       // dd($this->errorMessage);
        $customer = Customer::where('n_document', $this->customerSearch)->first();

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

            $imageName = $this->name .time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images/pets', $imageName);
            $this->imagePreview  = $this->image->temporaryUrl();

        } else {
             $imageName = $this->pet->image;
        }

       
        try {
            $this->pet->update([
                'name' => $this->name,
                'sex' => $this->sex,
                'color' => $this->color,
                'specie_id' => $this->specie_id,
                'race' => $this->race,
                'pedigree' => $this->pedigree,
                'birthdate' => $this->birthdate ,
                'image' =>  $imageName,
                'customer_id' => $this->customer_id,
            ]);

            session()->flash('msn_success', 'Mascota actualizada con éxito.');
            $this->redirectRoute('pets.index');
        } catch (\Exception $e) {
            $this->dispatch('alert-sweet', message: 'No se logró actualizar la mascota', icon: 'error');
        }
    }

    public function render()
    {
        $species = Specie::all();
        return view('livewire.pets.edit-pet', compact('species'));
    }
}
