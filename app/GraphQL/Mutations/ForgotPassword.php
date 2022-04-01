<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Contracts\Auth\PasswordBroker;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ForgotPassword
{
    public function __construct(
        protected PasswordBroker $passwordBroker
    )
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {   
        if (isset($args['reset_password_url'])) {
            // handle reset password url
        }

        return [
            'status' => 'EMAIL_SENT'
        ];
    }
}