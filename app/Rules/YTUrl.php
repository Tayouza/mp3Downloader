<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class YTUrl implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (
            ! str_contains($value, 'https://youtube.com/watch?v=') &&
            ! str_contains($value, 'https://www.youtube.com/watch?v=') &&
            ! str_contains($value, 'https://youtu.be') &&
            ! str_contains($value, 'https://www.youtu.be')
        ) {
            $fail('The :attribute must be a valid YouTube URL.');
        }
    }
}
