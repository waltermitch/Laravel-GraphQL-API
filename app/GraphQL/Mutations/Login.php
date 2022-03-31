<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Config\Repository as Config;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class Login
{   
    public function __construct(
        protected AuthManager $authManager,
        protected Config $config
    )
    {
        
    }

    public function __invoke($_, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $userProvider = $this->authManager->createUserProvider(config('lighthouse-sanctum.provider'));

        $user = $userProvider->retrieveByCredentials([
            'email' => $args['email'],
            'password' => $args['password']
        ]);

        return [
            "token" => "access token placeholder"
        ];
    }
}