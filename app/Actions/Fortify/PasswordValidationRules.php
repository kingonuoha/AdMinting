<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', new Password,
        'min:6',
        // 'regex:/^.*(?=.{1,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@.,&]).*$/',
        'confirmed'];
    }
}
