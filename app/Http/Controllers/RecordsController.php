<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Record;
use App\Models\Session;

class RecordsController extends Controller
{
    public function create(Session $session)
    {
        return view('records.create', [
            'session' => $session,
            'exercises' => Exercise::all(),
        ]);
    }

    public function edit(Session $session, Record $record)
    {
        return view('records.edit', [
            'session' => $session,
            'exercises' => Exercise::all(),
            'record' => $record,
        ]);
    }

    public function destroy(Session $session, Record $record)
    {
        $record->delete();

        return redirect()->route('sessions.show', ['session' => $session]);
    }
}
