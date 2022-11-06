<?php

namespace App\GraphQL\Validators;

use Illuminate\Validation\Rules\Password;
use Nuwave\Lighthouse\Validation\Validator;

final class RegisterInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'nickname' => [
                'string',
                'max:32',
            ],
            'email' => [
                'email',
            ],
            'password' => [
                Password::min(8),
            ],
        ];
    }
}
