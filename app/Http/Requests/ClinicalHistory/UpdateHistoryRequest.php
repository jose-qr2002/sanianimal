<?php

namespace App\Http\Requests\ClinicalHistory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHistoryRequest extends FormRequest
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
        $history = $this->route('history');

        return [
            'number' => ['required', 'integer', 'min:1', 'unique:clinical_histories,number,'.$history->id],
        ];
    }
}
