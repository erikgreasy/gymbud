<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Session;

class SessionShowExerciseController extends Controller
{
    public function __invoke(Session $session, Exercise $exercise)
    {
        return view('sessions.exercises.show', [
            'session' => $session,
            'exercise' => $exercise,
        ]);
    }
}
