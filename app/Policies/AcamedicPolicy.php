<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Acamedic;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcamedicPolicy
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
        return $user->can('view_any_acamedic');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acamedic  $acamedic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Acamedic $acamedic)
    {
        return $user->can('view_acamedic');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_acamedic');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acamedic  $acamedic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Acamedic $acamedic)
    {
        return $user->can('update_acamedic');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acamedic  $acamedic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Acamedic $acamedic)
    {
        return $user->can('delete_acamedic');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_acamedic');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acamedic  $acamedic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Acamedic $acamedic)
    {
        return $user->can('force_delete_acamedic');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_acamedic');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acamedic  $acamedic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Acamedic $acamedic)
    {
        return $user->can('restore_acamedic');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_acamedic');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Acamedic  $acamedic
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Acamedic $acamedic)
    {
        return $user->can('replicate_acamedic');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_acamedic');
    }

}
