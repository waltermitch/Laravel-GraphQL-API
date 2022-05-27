<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Unit;
use App\Traits\Auth\ManagesAuth;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class OperatingReport
{   
    use ManagesAuth;

    public function __construct()
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // TO-DO

        // validate that unit is closed

        // user -> location manager -> check if unit belongs to him

        // user -> 

        $user = static::authenticatedUser();

        $unit = Unit::find($args['unit']);

        $user->can('generateOperatingReport', [$unit, $args['type']]);
        
        return url('/');
    }
}