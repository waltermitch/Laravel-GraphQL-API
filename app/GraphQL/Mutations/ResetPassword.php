<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphQLValidationException;
use App\Services\Auth\ResetPasswordService;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Password;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ResetPassword
{   
    const FIELD_TO_STATUS_MAP = [
        Password::INVALID_USER => 'email',
        Password::INVALID_TOKEN => 'token'
    ];

    public function __construct(
        protected ResetPasswordService $resetPasswordService
    )
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {   
        $status = Password::reset($args, function(Authenticatable $user, string $password) {
            $this->resetPasswordService->resetPassword($user, $password);
        });

        if ($status === Password::PASSWORD_RESET) {
            return [
                'status'=> 'PASSWORD_RESET',
                'message' => __($status)
            ];
        }

        throw new GraphQLValidationException(
            __($status),
            self::FIELD_TO_STATUS_MAP[$status] ?? '',
            $resolveInfo
        );
    }


}