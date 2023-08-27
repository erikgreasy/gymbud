<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\User;

class ExercisesController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();

        return view('exercises.index', [
            'exercises' => $user->exercises,
        ]);
    }

    public function create()
    {
        /** @var User $user */
        $user = auth()->user();

        return view('exercises.create', [
            'categories' => $user->categories,
        ]);
    }

    public function edit(Exercise $exercise)
    {
        $this->authorize('update', $exercise);

        /** @var User $user */
        $user = auth()->user();

        return view('exercises.edit', [
            'categories' => $user->categories,
            'exercise' => $exercise,
        ]);
    }
}
