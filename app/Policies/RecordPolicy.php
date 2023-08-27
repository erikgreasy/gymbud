<?php

namespace App\Policies;

use App\Models\Record;
use App\Models\User;

class RecordPolicy
{
    public function update(User $user, Record $record): bool
    {
        return $user->id === $record->session->user_id;
    }

    public function delete(User $user, Record $record): bool
    {
        return $user->id === $record->session->user_id;
    }
}
