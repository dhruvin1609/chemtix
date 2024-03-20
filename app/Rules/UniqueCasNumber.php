<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use App\Models\CustomerProduct;

class UniqueCasNumber implements Rule
{
    public function passes($attribute, $value)
    {
        return !CustomerProduct::where('cas_number', $value)->exists();
    }

    public function message()
    {
        return 'The :attribute must be unique.';
    }
}
