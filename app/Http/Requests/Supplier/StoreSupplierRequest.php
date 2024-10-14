<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
            'ruc' => 'required|digits:11|unique:suppliers,ruc',
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:9',
            'address' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
        ];
    }
}
