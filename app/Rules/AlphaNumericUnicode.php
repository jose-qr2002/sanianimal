<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Regla para verificar si un valor solo contiene numeros y letras
 */
class AlphaNumericUnicode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^[\p{L}\p{N}\s]+$/u', $value)) {
            $fail("El campo :attribute no es alfanumerico");
        }
    }
}
