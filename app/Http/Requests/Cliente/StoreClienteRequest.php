<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'nombre' => 'required',
            'apellido' => 'required',
            'n_documento' => 'required|integer',
            'sexo' => 'required|in:F,M',
            'email' => 'nullable|email',
            'direccion' => 'nullable',
            'fecha_nacimiento' => 'nullable|date'
        ];
    }
}
