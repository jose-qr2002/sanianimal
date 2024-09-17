<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'sex' => ['required','in:Macho,Hembra,Indefinido'],
            'birthdate' => ['nullable','date'],
            'pedigree' => ['required','boolean'],
            'specie_id' => ['required','integer','exists:species,id'],
            'customer_id' => ['required','integer','exists:customers,id'],
            'color' => ['nullable','string'],
            'race' => ['nullable','string']
        ];
    }
}
