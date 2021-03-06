<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WithinUsage implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (($value + auth()->user()->usage()) > auth()->user()->plan->storage) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You don\'t have enough space to upload this file. Please delete files or upgrade your plan.';
    }
}
