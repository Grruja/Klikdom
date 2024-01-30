<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class FloorCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $totalFloors = request()->input('total_floors');

        if (!is_numeric($value) || $value > $totalFloors) {
            $fail("The $attribute must be less than or equal to the total number of floors.");
        }
    }
}
