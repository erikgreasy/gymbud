<?php

namespace App\Livewire\Pages\Sessions;

use App\Models\Record;
use App\Models\Session;
use Livewire\Component;

class Show extends Component
{
    public Session $session;

    public function deleteRecord(Record $record): void
    {
        $record->delete();
        $this->redirect(route('sessions.show', ['session' => $this->session]));
    }

    public function render()
    {
        return view('livewire.pages.sessions.view');
    }
}
