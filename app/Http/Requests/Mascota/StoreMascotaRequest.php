<?php

namespace App\Http\Requests\Mascota;

use Illuminate\Foundation\Http\FormRequest;

class StoreMascotaRequest extends FormRequest
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
            'nombre' => ['required'],
            'sexo' => ['required','in:Macho,Hembra,Indefinido'],
            'fecha_nacimiento' => ['nullable','date'],
            'pedigree' => ['required','boolean'],
            'especie_id' => ['required','integer','exists:especies,id'],
            'cliente_id' => ['required','integer','exists:clientes,id']
        ];
    }
}
