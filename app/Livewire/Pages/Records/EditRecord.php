<?php

namespace App\Livewire\Pages\Records;

use App\Models\Exercise;
use App\Models\Record;
use App\Models\Session;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditRecord extends Component
{
    public Record $record;

    public Session $session;

    public $exercises;

    #[Rule(['required', 'exists:exercises,id'])]
    public $exerciseId = null;

    #[Rule(['required', 'numeric', 'min:0'])]
    public $weight;

    #[Rule(['required', 'numeric', 'min:0'])]
    public $reps;

    public function mount(): void
    {
        $this->exercises = Exercise::all();
        $this->exerciseId = $this->record->exercise_id;
        $this->weight = $this->record->weight;
        $this->reps = $this->record->reps;
    }

    public function updateRecord(): void
    {
        $data = $this->validate();

        $this->record->update([
            'weight' => $data['weight'],
            'reps' => $data['reps'],
            'exercise_id' => $data['exerciseId'],
        ]);

        $this->redirect(route('sessions.show', ['session' => $this->session]), true);
    }

    public function render()
    {
        return view('livewire.pages.records.edit-record');
    }
}
