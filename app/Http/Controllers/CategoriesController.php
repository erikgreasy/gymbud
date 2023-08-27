<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;

class CategoriesController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();

        return view('categories.index', [
            'categories' => $user->categories,
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('categories.edit', [
            'category' => $category
        ]);
    }
}
