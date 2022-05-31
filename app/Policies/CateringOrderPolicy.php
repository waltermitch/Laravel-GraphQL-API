<?php

namespace App\Policies;

use App\Models\CateringOrder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CateringOrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CateringOrder  $cateringOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CateringOrder $cateringOrder)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return !$user->isAdministrator();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CateringOrder  $cateringOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CateringOrder $cateringOrder, array $injectedArgs)
    {
        // TODO: refactor
        $updateIds = array_column($injectedArgs['items']['update'] ?? [], 'id');

        $deleteIds = $injectedArgs['items']['delete'] ?? [];
        
        if ($user->activePeriod()?->id === $cateringOrder->period_id &&
            $user->id === $cateringOrder->user_id &&
            !$user->isAdministrator() &&
            $cateringOrder->containItems($updateIds) &&
            $cateringOrder->containItems($deleteIds)) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CateringOrder  $cateringOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CateringOrder $cateringOrder)
    {
        if ($user->activePeriod()?->id === $cateringOrder->period_id &&
            $user->id === $cateringOrder->user_id &&
            !$user->isAdministrator()) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CateringOrder  $cateringOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CateringOrder $cateringOrder)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CateringOrder  $cateringOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CateringOrder $cateringOrder)
    {
        //
    }
}
