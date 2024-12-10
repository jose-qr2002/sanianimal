<?php

namespace App\Http\Requests\Vaccine;
use App\Rules\AlphaNumericUnicode;
use Illuminate\Foundation\Http\FormRequest;

class StoreVaccineRequest extends FormRequest
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
            'vaccine' => ['required', 'string'],
            'stock' => ['required','integer', 'min:0'],
            'detail' => ['nullable','string', new AlphaNumericUnicode],
        ];
    }
}
