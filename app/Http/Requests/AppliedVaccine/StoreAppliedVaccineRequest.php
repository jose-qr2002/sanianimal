<?php

namespace App\Http\Requests\AppliedVaccine;

use App\Rules\AlphaNumericUnicode;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppliedVaccineRequest extends FormRequest
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
            'vaccine_id' => ['required','integer','exists:applied_vaccines,id'],
            'observation' => ['nullable', 'string', new AlphaNumericUnicode] 
        ];
    }
}
