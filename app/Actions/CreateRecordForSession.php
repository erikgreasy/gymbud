<?php

namespace App\Actions;

use App\Models\Exercise;
use App\Models\Record;
use App\Models\Session;

class CreateRecordForSession
{
    public function execute(
        Session  $session,
        Exercise $exercise,
        float    $weight,
        int      $reps,
        ?string  $comment,
    ): Record
    {
        $record = $session->records()->make([
            'weight' => $weight,
            'reps' => $reps,
            'exercise_id' => $exercise->id,
            'comment' => $comment,
        ]);

        if ($this->isTheNewPr($exercise, $reps, $weight)) {
            $record->is_pr = true;
        }

        $record->save();

        $this->removeSmallerPrs($exercise, $reps, $weight);

        return $record;
    }

    private function isTheNewPr(Exercise $exercise, int $reps, float $weight): bool
    {
        return $this->isPrevPrSmaller($exercise, $reps, $weight) &&
            $this->biggerPrsDontExist($exercise, $reps, $weight);
    }

    private function isPrevPrSmaller(Exercise $exercise, int $reps, float $weight): bool
    {
        $previousPr = $exercise->prFor($reps);

        if (!$previousPr) {
            return true;
        }

        if ($previousPr->weight < $weight) {
            return true;
        }

        return false;
    }

    private function biggerPrsDontExist(Exercise $exercise, int $reps, float $weight): bool
    {
        $biggerPrs = $exercise
            ->prs
            ->where('weight', '>=', $weight)
            ->where('reps', '>', $reps);

        return $biggerPrs->isEmpty();
    }

    private function removeSmallerPrs(Exercise $exercise, int $reps, float $weight): void
    {
        $exercise
            ->prs
            ->where('weight', '<=', $weight)
            ->where('reps', '<', $reps)
            ->each(fn (Record $pr) => $pr->update(['is_pr' => false]));

    }
}
