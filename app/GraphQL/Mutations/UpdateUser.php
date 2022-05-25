<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Enums\UserUpdateStatus;

class UpdateUser
{

    public function __construct()
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($args['id']);
            if (isset($args['password'])) {
                $args['password'] = Hash::make($args['password']);
            }
            
            $user->fill($args)->save();
            
            if (!$user->is_admin && !empty($args['units']['sync'])) {
                $user->units()->sync($args['units']['sync']);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            return [
                'status' => UserUpdateStatus::ERROR,
                'message' => __('update_user.error')
            ];
        }
        
        return [
            'status' => UserUpdateStatus::UPDATED,
            'message' => __('update_user.updated')
        ];
    }
}
