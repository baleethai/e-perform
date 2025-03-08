<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Personnel;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonnelPolicy
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
        return $user->can('view_any_personnel');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Personnel $personnel)
    {
        return $user->can('view_personnel');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_personnel');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Personnel $personnel)
    {
        return $user->can('update_personnel');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Personnel $personnel)
    {
        return $user->can('delete_personnel');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_personnel');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Personnel $personnel)
    {
        return $user->can('force_delete_personnel');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_personnel');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Personnel $personnel)
    {
        return $user->can('restore_personnel');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_personnel');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Personnel $personnel)
    {
        return $user->can('replicate_personnel');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_personnel');
    }

}
