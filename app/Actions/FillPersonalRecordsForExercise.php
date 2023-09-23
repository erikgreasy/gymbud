<?php

namespace App\Actions;

use App\Models\Exercise;
use App\Models\Record;

class FillPersonalRecordsForExercise
{
    public function execute(Exercise $exercise): void
    {
        $records = $exercise->records()->withAggregate('session', 'date')->get();
        $records->each(fn ($record) => $record->update(['is_pr' => false]));

        $prs = collect(range(1, 20))
            ->mapWithKeys(function ($reps) use ($records) {
                $recordsWithReps = $records->where('reps', $reps);

                $maxWeight = $recordsWithReps->max('weight');
                $repsWithMaxWeight = $recordsWithReps->where('weight', $maxWeight);

                $pr = $repsWithMaxWeight->sortBy('session_date')->first();

                return [$reps => $pr];
            });

        $tempMaxWeight = $prs[20]?->weight ?? 0;

        foreach (range(19, 1) as $reps) {
            if (!$prs[$reps]) {
                continue;
            }

            if ($prs[$reps]->weight > $tempMaxWeight) {
                $tempMaxWeight = $prs[$reps]->weight;
            } else {
                $prs[$reps] = null;
            }
        }

        $prs
            ->filter()
            ->each(fn (Record $record) => $record->update(['is_pr' => true]));
    }
}
