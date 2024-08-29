<?php

namespace App\Http\Requests\Medicamento;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicamentoRequest extends FormRequest
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
            'marca' => ['required'],
            'stock' => ['required','integer','min:0'],
            'precio' => ['required','numeric','min:0.10'],
            'descripcion' => ['nullable','max:1000'],
        ];
    }
}
