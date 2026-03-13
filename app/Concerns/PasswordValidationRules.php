<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the password validation rules used to validate passwords.
     *
     * @return array<int, Password|string|null>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', 'confirmed', Password::defaults()];
    }

    /**
     * Get the validation rules used to validate the current password.
     *
     * @return array<int, Password|string|null>
     */
    protected function currentPasswordRules(): array
    {
        return ['required', 'string', 'current_password'];
    }
}
