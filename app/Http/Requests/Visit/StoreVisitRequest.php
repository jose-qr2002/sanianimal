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
            'heart_rate' => ['nullable','integer','min:1'],
            'respiratory_rate' => ['nullable','integer','min:1'],
            'temperature' => ['nullable','numeric','between:25,50', new OptionalDecimal],
            'anamnesis' => ['nullable', 'string', new AlphaNumericUnicode],
            'symptoms' => ['nullable','string', new AlphaNumericUnicode],
            'exams' => ['nullable', 'string', new AlphaNumericUnicode],
            'differential_diagnosis' => ['nullable', 'string', new AlphaNumericUnicode],
            'definitive_diagnosis' => ['nullable', 'string', new AlphaNumericUnicode],
            'treatment' => ['nullable', 'string', new AlphaNumericUnicode],
            'exam_results' => ['nullable', 'string', new AlphaNumericUnicode],
            'recommendations' => ['nullable', 'string', new AlphaNumericUnicode],
            'recipes' => ['nullable', 'string', new AlphaNumericUnicode],
            'price' => ['nullable', 'numeric', 'min:0.01', 'max:1000', new OptionalDecimal],
            'weight' => ['nullable', 'numeric', 'min:0.01', 'max:120', new OptionalDecimal],
            'date' => ['required', 'date'],
            'time' => ['required','date_format:H:i','after_or_equal:06:00','before_or_equal:24:00'],
            'clinical_history_id' => ['required','integer','exists:clinical_histories,id'],

            'vaccines' => ['nullable', 'array'],
            'vaccines.*.vaccine_id' => ['required_with:vaccines','integer'],
            'vaccines.*.observation' => ['required_with:vaccines','string', new AlphaNumericUnicode],
        ];
    }
}
