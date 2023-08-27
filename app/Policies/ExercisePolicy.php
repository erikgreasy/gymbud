<?php

namespace App\Policies;

use App\Models\Exercise;
use App\Models\User;

class ExercisePolicy
{
    public function update(User $user, Exercise $exercise): bool
    {
        return $exercise->category->user_id == $user->id;
    }
}
