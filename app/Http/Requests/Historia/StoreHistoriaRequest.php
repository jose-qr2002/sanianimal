<?php

namespace App\Http\Requests\Historia;

use Illuminate\Foundation\Http\FormRequest;

class StoreHistoriaRequest extends FormRequest
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
            'numero' => ['required','integer','unique:historias_clinicas,numero'],
            'motivo' => ['nullable','string'],
            'mucosas' => ['nullable', 'string'],
            'amnanesis' => ['nullable', 'string'],
            'diagnostico' => ['nullable', 'string'],
            'tratamiento' => ['nullable', 'string'],
            'precio' => ['nullable', 'decimal:2,5'],
            'peso' => ['nullable', 'decimal:2,4'],
            'fecha' => ['required', 'date'],
            'mascota_id' => ['required', 'integer']
        ];
    }
}
