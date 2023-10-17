<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Session;

class SessionExercisePrsController extends Controller
{
    public function __invoke(Session $session, Exercise $exercise)
    {
        return view('sessions.exercises.records', [
            'session' => $session,
            'exercise' => $exercise->load('prs.session'),
        ]);
    }
}
