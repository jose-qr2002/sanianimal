<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Regla para verificar si el numero tiene un formato decimal correcto
 * Si el numero no es decimal no salta error en la validacion
 */
class OptionalDecimal implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^\d+(\.\d{1,2})?$/', $value)) {
            $fail("El campo :attribute debe tener dos decimales");
        }
    }
}
