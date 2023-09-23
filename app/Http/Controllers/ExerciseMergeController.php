<?php

namespace App\Http\Controllers;

use App\Actions\MergeExercises;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseMergeController extends Controller
{
    public function create(Exercise $exercise)
    {
        return view('exercises.merge', [
            'exercise' => $exercise,
            'exercises' => auth()->user()->exercises->where('id', '!=', $exercise->id),
        ]);
    }

    public function store(Request $request, Exercise $exercise, MergeExercises $mergeExercises)
    {
        $validated = $request->validate([
            'target_exercise_id' => ['required', 'exists:exercises,id']
        ]);

        $mergeExercises->execute($exercise, Exercise::find($validated['target_exercise_id']));

        return redirect()->route('exercises.index');
    }
}
