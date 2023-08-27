<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        /** @var User $user */
        $user = auth()->user();

        return view('home', [
            'sessions' => $user->sessions()->with('records')->get(),
        ]);
    }
}
