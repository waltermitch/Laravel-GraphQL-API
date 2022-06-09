<?php

namespace App\Policies;

use App\Models\RegisterCloseout;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegisterCloseoutPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if (!$user->isAdministrator()) {
            if (!$user->hasSelectedUnit()) {
                return false;
            }
        }
    }

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
     * @param  \App\Models\RegisterCloseout  $registerCloseout
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RegisterCloseout $registerCloseout)
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
     * @param  \App\Models\RegisterCloseout  $registerCloseout
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RegisterCloseout $registerCloseout, array $injectedArgs)
    {   
        // TODO: refactor
        $updateIds = array_column($injectedArgs['items']['update'] ?? [], 'id');

        $deleteIds = $injectedArgs['items']['delete'] ?? [];

        if ($user->activePeriod()?->id === $registerCloseout->period_id &&
            $user->id === $registerCloseout->user_id &&
            !$user->isAdministrator() &&
            $registerCloseout->containItems($updateIds) &&
            $registerCloseout->containItems($deleteIds)) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisterCloseout  $registerCloseout
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RegisterCloseout $registerCloseout)
    {
        if ($user->activePeriod()?->id === $registerCloseout->period_id &&
            $user->id === $registerCloseout->user_id &&
            !$user->isAdministrator()) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisterCloseout  $registerCloseout
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RegisterCloseout $registerCloseout)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegisterCloseout  $registerCloseout
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RegisterCloseout $registerCloseout)
    {
        //
    }
}
