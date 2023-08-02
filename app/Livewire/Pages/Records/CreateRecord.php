<?php

namespace App\Livewire\Pages\Records;

use App\Models\Exercise;
use App\Models\Session;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateRecord extends Component
{
    public Session $session;

    public $exercises;

    #[Rule(['required', 'exists:exercises,id'])]
    public $exerciseId = null;

    #[Rule(['required', 'numeric', 'min:0'])]
    public $weight;

    #[Rule(['required', 'numeric', 'min:0'])]
    public $reps;

    #[Rule(['nullable', 'string'])]
    public $comment;

    public function mount(): void
    {
        $this->exercises = Exercise::all();
    }

    public function storeRecord(): void
    {
        $data = $this->validate();

        $this->session->records()->create([
            'weight' => $data['weight'],
            'reps' => $data['reps'],
            'exercise_id' => $data['exerciseId'],
            'comment' => $data['comment'],
        ]);

        $this->redirect(route('sessions.show', ['session' => $this->session]), true);
    }

    public function render()
    {
        return view('livewire.pages.records.create-record');
    }
}
