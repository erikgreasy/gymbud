<?php

namespace App\Http\Controllers;

use App\Models\Session;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'sessions' => Session::with('records')->get(),
        ]);
    }
}
