<?php

namespace App\Enums;
use BenSampo\Enum\Attributes\Description;

use BenSampo\Enum\Enum;

/**
 * @method static static DolarsPerWeek()
 */
final class FeeType extends Enum
{   
    #[Description('Dolars per week')]
    const DolarsPerWeek = 0;
}
