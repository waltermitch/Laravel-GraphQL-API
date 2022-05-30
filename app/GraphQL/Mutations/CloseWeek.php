<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Traits\Auth\ManagesAuth;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CloseWeek
{   
    use ManagesAuth;

    public function __construct()
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {   
        Gate::allowIf(fn ($user) => !$user->isAdministrator());

        DB::beginTransaction();

        try {
            $user = static::authenticatedUser();
            
            $selectedUnit = $user->selectedUnit();

            $activePeriod = $selectedUnit->activePeriod();
            
            if (!is_null($activePeriod)) {
                $selectedUnit->periods()->updateExistingPivot($activePeriod->id, [
                    'is_closed' => true
                ]);
                
                $next = $activePeriod->next();
                
                $selectedUnit->periods()->attach($next);
                
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollback();
            
            return false;
        }
        
        return true;
    }
}