<?php

namespace App\Http\Requests\Product;

use App\Rules\OptionalDecimal;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'code' => ['nullable','string','alpha_num','unique:products,code'],
            'name' => ['required'],
            'stock' => ['required','integer','min:0'],
            'price' => ['required','numeric','min:0.10', new OptionalDecimal],
            'measurement' => ['required', 'in:units,kilograms,grams'],
            'brand' => ['nullable'],
            'category_id' => ['nullable', 'integer'],
            'supplier_id' => ['nullable','integer'],
            'description' => ['nullable','max:1000'],
        ];
    }
}
