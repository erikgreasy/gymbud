<?php

namespace App\Actions;

use App\Models\Exercise;
use App\Models\Record;

class UpdateRecord
{
    public function __construct(private FillPersonalRecordsForExercise $fillPersonalRecordsForExercise)
    {
    }

    public function execute(
        Record   $record,
        Exercise $exercise,
        float    $weight,
        int      $reps,
        ?string  $comment,
    ): Record
    {
        $record->weight = $weight;
        $record->reps = $reps;
        $record->comment = $comment;
        $record->exercise_id = $exercise->id;
        $record->save();

        $this->fillPersonalRecordsForExercise->execute($exercise);

        return $record;
    }
}
