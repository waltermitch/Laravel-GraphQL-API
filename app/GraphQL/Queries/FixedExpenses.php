<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Traits\Auth\ManagesAuth;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use Illuminate\Support\Facades\DB;

class FixedExpenses
{   
    use ManagesAuth;

    public function __construct()
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {   
        $user = static::authenticatedUser();
        $selectedUnit = $user->selectedUnit();
        $fixedExpenses = DB::table('fixed_expenses')->where('unit_id', $selectedUnit->id)->get();
        return $fixedExpenses;
    }
}