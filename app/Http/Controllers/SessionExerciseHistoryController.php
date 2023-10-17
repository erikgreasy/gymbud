<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Session;
use Illuminate\Database\Eloquent\Builder;

class SessionExerciseHistoryController extends Controller
{
    public function __invoke(Session $session, Exercise $exercise)
    {
        return view('sessions.exercises.history', [
            'session' => $session,
            'exercise' => $exercise,
            'exerciseSessions' => auth()->user()->sessions()->whereHas('records', function (Builder $query) use ($exercise) {
                $query->where('exercise_id', $exercise->id);
            })->with('records')->get(),
        ]);
    }
}
