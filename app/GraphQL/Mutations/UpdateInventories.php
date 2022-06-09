<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Inventory;
use App\Models\InventoryCategory;
use App\Traits\Auth\ManagesAuth;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Gate;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UpdateInventories
{   
    use ManagesAuth;

    public function __construct()
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {   
        Gate::allowIf(fn ($user) => !$user->isAdministrator() && $user->hasSelectedUnit());

        $user = static::authenticatedUser();

        $selectedUnit = $user->selectedUnit();

        $activePeriod = $selectedUnit->activePeriod();

        foreach($args['inventoriesInput'] as $inventoryInput) {
            Inventory::updateOrCreate(
                [   
                    'inventory_category_id' => $inventoryInput['id'],
                    'period_id' => $activePeriod->id, 
                    'unit_id' => $selectedUnit->id, 
                ],
                [
                    'amount' => $inventoryInput['amount']
                ]
            );
        }

        return InventoryCategory::all();
    }
}