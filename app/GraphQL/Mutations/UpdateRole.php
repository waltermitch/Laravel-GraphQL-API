<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UpdateRole
{

    public function __construct()
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        DB::beginTransaction();
        try {
            $role = Role::findOrFail($args['id']);
            $role->name = $args['name'];
            $role->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            return [
                'status' => false,
                'message' => __('update_role.error')
            ];
        }
        
        return [
            'status' => true,
            'message' => __('update_role.updated')
        ];
    }
}
