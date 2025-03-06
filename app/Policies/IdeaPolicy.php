<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
 

    /**
     * Determine whether the user can update the model.
     */


    public function update(User $user, Idea $idea)
    {
        return ($user->is_admin || $user->is($idea->user));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Idea $idea)
    {
        return ($user->is_admin || $user->is($idea->user));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Idea $idea)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Idea $idea)
    {
        //
    }
}
