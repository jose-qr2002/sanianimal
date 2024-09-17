<?php

namespace App\Http\Requests\Customer;

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
            'name' => ['required'],
            'lastname' => ['required'],
            'n_document' => ['required','integer'],
            'sex' => ['required','in:M,F'],
            'email' => ['required','email'],
            'address' => ['required'],
            'birthdate' => ['required','date'],
        ];
    }
}
