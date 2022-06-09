<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Unit;
use App\Traits\Auth\ManagesAuth;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Gate;
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

        // uncomment to add gate policy
        // use policy logic here, cause we can't apply separate class to that (it's not a resource)
        
        // Gate::allowIf(fn ($user) => $user->isAdministrator());

        // retrieve user
        // $user = static::authenticatedUser();
        
        return url('/');
    }
}