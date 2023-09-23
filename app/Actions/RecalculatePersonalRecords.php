<?php

namespace App\Actions;

use App\Models\Exercise;
use App\Models\User;

class RecalculatePersonalRecords
{
    public function __construct(private FillPersonalRecordsForExercise $fillPersonalRecordsForExercise)
    {
    }

    public function execute(): void
    {
        User::each(function (User $user) {
            $user->exercises->each(function (Exercise $exercise) use ($user) {
                $this->fillPersonalRecordsForExercise->execute($exercise);
            });
        });
    }
}
