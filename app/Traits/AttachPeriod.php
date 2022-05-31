<?php

declare(strict_types=1);

namespace App\Traits;

use App\Exceptions\ClientException;
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
                if($model->isRelation('periods')) {
                    $model->periods()->attach(Period::currentPeriod());
                }
            }
        });
        
        static::saving(function ($model) {
            if (!$model instanceof Unit) {
                $user = static::authenticatedUser();

                $selectedUnit = $user->selectedUnit();

                $activePeriod = $selectedUnit->activePeriod();

                if(!$selectedUnit) {
                    throw new ClientException(
                        message: "The unit must be selected by the user."
                    );
                }

                if($model->isRelation('period') && $activePeriod) {
                    $model->period()->associate($activePeriod);
                }
            }
        });
    }

}