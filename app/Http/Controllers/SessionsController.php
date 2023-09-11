<?php

namespace App\Http\Controllers;

use App\Models\Session;

class SessionsController extends Controller
{
    public function show(Session $session)
    {
        $this->authorize('view', $session);

        $user = auth()->user();

        $prevSession = $user->sessions()->where([
            ['date', '<=', $session->date],
            ['id', '!=', $session->id],
        ])
            ->first();

        $nextSession = $user->sessions()->where([
            ['date', '>=', $session->date],
            ['id', '!=', $session->id],
        ])
            ->withoutGlobalScope('order_by_date')
            ->first();

        return view('sessions.show', [
            'session' => $session->load(['records', 'records.exercise', 'records.session']),
            'prevSession' => $prevSession,
            'nextSession' => $nextSession,
        ]);
    }

    public function create()
    {
        return view('sessions.create');
    }
}
