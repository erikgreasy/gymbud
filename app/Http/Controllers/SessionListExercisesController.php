<?php

namespace App\Http\Controllers;

use App\Models\Session;

class SessionListExercisesController extends Controller
{
    public function __invoke(Session $session)
    {
        return view('sessions.exercises.index', [
            'session' => $session,
            'exercises' => auth()->user()->exercises,
        ]);
    }
}
