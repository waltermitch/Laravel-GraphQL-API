<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Models\RoleMenu;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Enums\UserUpdateStatus;

class UpdateRolePermission
{

    public function __construct()
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        DB::beginTransaction();
        try {
            $role = RoleMenu::where('role_id', $args['role_id'])->where('menu_id', $args['menu_id'])->first();
            if ( !$role ) {
                return [
                    'status' => false,
                    'message' => 'role with the menu doesn\'t exist'
                ];
            }
            if ( $args['permission'] == 'view' ) {
                $role->is_view = $args['allow'];
            } else if ( $args['permission'] == 'create' ) {
                $role->is_create = $args['allow'];
            } else if ( $args['permission'] == 'modify' ) {
                $role->is_modify = $args['allow'];
            } else {
                return [
                    'status' => false,
                    'message' => 'that permission doesn\'t exist'
                ];
            }
            $role->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            return [
                'status' => false,
                'message' => __('update_role_permission.error')
            ];
        }
        
        return [
            'status' => true,
            'message' => __('update_role_permission.updated')
        ];
    }
}
