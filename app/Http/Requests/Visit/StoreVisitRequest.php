<?php

namespace App\Http\Requests\Visit;

use App\Rules\AlphaNumericUnicode;
use App\Rules\OptionalDecimal;
use Illuminate\Foundation\Http\FormRequest;

class StoreVisitRequest extends FormRequest
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
            'number' => ['required','integer','unique:visits,number'],
            'reason' => ['nullable','string', new AlphaNumericUnicode],
            'mucous' => ['nullable', 'string', new AlphaNumericUnicode],
            'amnanesis' => ['nullable', 'string', new AlphaNumericUnicode],
            'diagnosis' => ['nullable', 'string', new AlphaNumericUnicode],
            'treatment' => ['nullable', 'string', new AlphaNumericUnicode],
            'price' => ['nullable', 'numeric', 'min:0.01', 'max:1000', new OptionalDecimal],
            'weight' => ['nullable', 'numeric', 'min:0.01', 'max:120', new OptionalDecimal],
            'date' => ['required', 'date'],
            'clinical_history_id' => ['required','integer','exists:clinical_histories,id']
        ];
    }
}