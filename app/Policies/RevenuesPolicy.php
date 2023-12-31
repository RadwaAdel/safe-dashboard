<?php

namespace App\Policies;

use App\Models\Revenues;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RevenuesPolicy
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
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Revenues $revenues)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function edit(User $user, Revenues $revenues)
    {
        return auth()->user()->is_admin==1 || $user->id === $revenues->user_id ;

    }
    public function update(User $user, Revenues $revenues)
    {
        return auth()->user()->is_admin==1 || $user->id === $revenues->user_id ;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Revenues $revenues)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Revenues $revenues)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Revenues  $revenues
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Revenues $revenues)
    {
        //
    }
}
