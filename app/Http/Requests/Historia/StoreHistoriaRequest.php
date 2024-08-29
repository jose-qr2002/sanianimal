<?php

namespace App\Http\Requests\Historia;

use App\Rules\AlphaNumericUnicode;
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
            'motivo' => ['nullable','string', new AlphaNumericUnicode],
            'mucosas' => ['nullable', 'string', new AlphaNumericUnicode],
            'amnanesis' => ['nullable', 'string', new AlphaNumericUnicode],
            'diagnostico' => ['nullable', 'string', new AlphaNumericUnicode],
            'tratamiento' => ['nullable', 'string', new AlphaNumericUnicode],
            'precio' => ['nullable', 'numeric', 'min:0.01', 'max:1000', 'regex:/^\d+(\.\d{1,2})?$/'],
            'peso' => ['nullable', 'numeric', 'min:0.01', 'max:120', 'regex:/^\d+(\.\d{1,2})?$/'],
            'fecha' => ['required', 'date'],
            'mascota_id' => ['required', 'integer']
        ];
    }
}
