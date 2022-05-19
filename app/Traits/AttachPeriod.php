<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Period;
use App\Models\Unit;
use App\Traits\Auth\ManagesAuth;

trait AttachPeriod
{
    use ManagesAuth;

    /**
     * Boot the trait.
     * 
     * @return void
     */
    public static function bootAttachPeriod()
    {
        static::created(function ($model) {
            if ($model instanceof Unit) {
                $model->periods()->attach(Period::currentPeriod());
            }

        });
    }

}