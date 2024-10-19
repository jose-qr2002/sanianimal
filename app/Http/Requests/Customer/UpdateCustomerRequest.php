<?php

namespace App\Http\Requests\Customer;

use App\Rules\AlphaNumericUnicode;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'name' => ['required', new AlphaNumericUnicode],
            'lastname' => ['required', new AlphaNumericUnicode],
            'n_document' => ['nullable','integer','digits:8'],
            'sex' => ['required','in:M,F'],
            'email' => ['nullable','email'],
            'phone' => ['required','digits:9','starts_with:9'],
            'address' => ['nullable'],
            'birthdate' => ['nullable','date'],
        ];
    }
}
