<?php

namespace App\GraphQL\Validators;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

class UpdateUserInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['filled'],
            'last_name' => ['filled'],
            'email' => [
                'filled',
                'email',
                Rule::unique('users', 'email')->ignore($this->arg('id'))
            ],
            'password' =>['filled'],
            'is_admin' =>['filled'],
            'is_active' =>['filled']
        ];
    }
}
