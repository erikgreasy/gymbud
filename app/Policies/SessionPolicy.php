<?php

namespace App\Policies;

use App\Models\Session;
use App\Models\User;

class SessionPolicy
{
    public function view(User $user, Session $session): bool
    {
        return $user->id === $session->user_id;
    }
//
//    /**
//     * Determine whether the user can create models.
//     */
//    public function create(User $user): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can update the model.
//     */
//    public function update(User $user, Session $session): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can delete the model.
//     */
//    public function delete(User $user, Session $session): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can restore the model.
//     */
//    public function restore(User $user, Session $session): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the model.
//     */
//    public function forceDelete(User $user, Session $session): bool
//    {
//        //
//    }
}
