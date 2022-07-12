<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Enums\UserCreateStatus;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateRole
{

    public function __construct()
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        DB::beginTransaction();
        try {
            $exists = Role::where('name', $args['name'])->first();
            if ( $exists ) {
                return [
                    'status' => false,
                    'message' => 'already exists'
                ];
            }
            $role = new Role();
            $role->name = $args['name'];
            $role->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            return [
                'status' => false,
                'message' => __('create_role.error')
            ];
        }
        
        return [
            'status' => true,
            'message' => __('create_role.created')
        ];
    }
}
