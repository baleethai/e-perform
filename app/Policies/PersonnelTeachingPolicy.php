<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PersonnelTeaching;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonnelTeachingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_personnel::teaching');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonnelTeaching  $personnelTeaching
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PersonnelTeaching $personnelTeaching): bool
    {
        return $user->can('view_personnel::teaching');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_personnel::teaching');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonnelTeaching  $personnelTeaching
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PersonnelTeaching $personnelTeaching): bool
    {
        return $user->can('update_personnel::teaching');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonnelTeaching  $personnelTeaching
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PersonnelTeaching $personnelTeaching): bool
    {
        return $user->can('delete_personnel::teaching');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_personnel::teaching');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonnelTeaching  $personnelTeaching
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PersonnelTeaching $personnelTeaching): bool
    {
        return $user->can('force_delete_personnel::teaching');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_personnel::teaching');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonnelTeaching  $personnelTeaching
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PersonnelTeaching $personnelTeaching): bool
    {
        return $user->can('restore_personnel::teaching');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_personnel::teaching');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PersonnelTeaching  $personnelTeaching
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, PersonnelTeaching $personnelTeaching): bool
    {
        return $user->can('replicate_personnel::teaching');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_personnel::teaching');
    }

}
