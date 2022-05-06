<?php

namespace App\GraphQL\Validators;

use App\Models\Register;
use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

class UpdateRegisterInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        // against sql injection
        $updatingUnit = Register::find($this->arg('id'));

        return [
            'code' => [
                'filled',
                Rule::unique('registers', 'code')->ignore($updatingUnit),
            ],
            'name' => ['filled'],
            'is_active' => ['filled'],
            'reset_non_resetable' => ['filled'],
            'bank' => ['filled'],
            'nonResetable' => ['filled'],
            'commission' => ['filled'],
        ];
    }
}
