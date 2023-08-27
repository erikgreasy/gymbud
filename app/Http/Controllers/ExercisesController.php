<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exercise;

class ExercisesController extends Controller
{
    public function index()
    {
        return view('exercises.index', [
            'exercises' => Exercise::all()
        ]);
    }

    public function create()
    {
        return view('exercises.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {

    }

    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', [
            'categories' => Category::all(),
            'exercise' => $exercise,
        ]);
    }
}
