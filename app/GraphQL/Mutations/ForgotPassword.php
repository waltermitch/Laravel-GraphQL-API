<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Services\Auth\ResetPasswordService;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\Password;

class ForgotPassword
{
    public function __construct(
        protected ResetPasswordService $resetPasswordService
    )
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {       
        if (isset($args['reset_password_url'])) {
            $url = $args['reset_password_url'];

            $this->resetPasswordService->setResetPasswordUrl($args['reset_password_url']);
        }   

        // Todo: handle another statuses
        $status = Password::sendResetLink([
            'email' => $args['email']
        ]);

        return [
            'status' => 'EMAIL_SENT',
            'message' => __($status)
        ];
    }
}