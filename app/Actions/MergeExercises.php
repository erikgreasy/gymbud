<?php

namespace App\Actions;

use App\Models\Exercise;
use App\Models\Record;

class MergeExercises
{
    public function __construct(private FillPersonalRecordsForExercise $fillPersonalRecordsForExercise)
    {
    }

    public function execute(Exercise $exerciseToDelete, Exercise $targetExercise): void
    {
        // update all records to new ID
        $exerciseToDelete
            ->records
            ->each(function (Record $record) use ($targetExercise) {
                $record->update(['exercise_id' => $targetExercise->id]);
            });

        // delete exercise
        $exerciseToDelete->delete();

        // recalculate PRs
        $this->fillPersonalRecordsForExercise->execute($targetExercise);
    }
}
