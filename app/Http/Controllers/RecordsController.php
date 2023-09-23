<?php

namespace App\Http\Controllers;

use App\Actions\FillPersonalRecordsForExercise;
use App\Models\Record;
use App\Models\Session;
use App\Models\User;

class RecordsController extends Controller
{
    public function create(Session $session)
    {
        /** @var User $user */
        $user = auth()->user();

        return view('records.create', [
            'session' => $session,
            'exercises' => $user->exercises,
        ]);
    }

    public function edit(Session $session, Record $record)
    {
        $this->authorize('update', $record);

        /** @var User $user */
        $user = auth()->user();

        return view('records.edit', [
            'session' => $session,
            'exercises' => $user->exercises,
            'record' => $record,
        ]);
    }

    public function destroy(Session $session, Record $record, FillPersonalRecordsForExercise $fillPersonalRecordsForExercise)
    {
        $this->authorize('delete', $record);

        $exercise = $record->exercise;
        $record->delete();

        $fillPersonalRecordsForExercise->execute($exercise);

        return redirect()->route('sessions.show', ['session' => $session]);
    }
}
