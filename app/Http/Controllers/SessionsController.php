<?php

namespace App\Http\Controllers;

use App\Models\Session;

class SessionsController extends Controller
{
    public function show(Session $session)
    {
        return view('sessions.show', [
            'session' => $session,
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }
}
