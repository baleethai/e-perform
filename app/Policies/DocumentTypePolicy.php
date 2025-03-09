<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DocumentType;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentTypePolicy
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
        return $user->can('view_any_document::type');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DocumentType $documentType): bool
    {
        return $user->can('view_document::type');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_document::type');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DocumentType $documentType): bool
    {
        return $user->can('update_document::type');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DocumentType $documentType): bool
    {
        return $user->can('delete_document::type');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_document::type');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DocumentType $documentType): bool
    {
        return $user->can('force_delete_document::type');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_document::type');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DocumentType $documentType): bool
    {
        return $user->can('restore_document::type');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_document::type');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, DocumentType $documentType): bool
    {
        return $user->can('replicate_document::type');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_document::type');
    }

}
