<?php

declare(strict_types=1);

namespace App\GraphQL\Validators;

use App\Models\Unit;
use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

class UpdateUnitInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        // against sql injection
        $updatingUnit = Unit::find($this->arg('id'));

        return [
            'code' => [
                'filled', 
                Rule::unique('units', 'code')->ignore($updatingUnit),
                'name' => ['filled'],
                'is_active' => ['filled'],
                'is_vending' => ['filled'],
                'address' => ['filled'],
                'zip' => ['filled'],
            ],
            
        ];
    }
}
