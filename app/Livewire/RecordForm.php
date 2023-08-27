<?php

namespace App\Livewire;

use App\Models\Record;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RecordForm extends Component
{
    public ?Record $record = null;

    public $exercises;

    public $session;

    #[Rule(['required', 'exists:exercises,id'])]
    public $exerciseId = null;

    #[Rule(['required', 'numeric', 'min:0'])]
    public $weight;

    #[Rule(['required', 'numeric', 'min:0'])]
    public $reps;

    #[Rule(['nullable', 'string'])]
    public $comment;

    public function mount()
    {
        if (!$this->record) {
            $this->record = $this->session->lastRecord;
        }

        $this->loadDataFromRecord();
    }

    /**
     * Set properties for the form from the record property.
     *
     * The record property might be null in 'create' view or in 'edit' view
     * when there is no record in session yet.
     */
    private function loadDataFromRecord(): void
    {
        $this->exerciseId = $this->record?->exercise_id;
        $this->weight = $this->record?->weight;
        $this->reps = $this->record?->reps;
        $this->comment = $this->record?->comment;
    }

    public function submit()
    {
        $data = $this->validate();

        if ($this->record) {
            $this->authorize('update', $this->record);

            $this->record->update([
                'weight' => $data['weight'],
                'reps' => $data['reps'],
                'exercise_id' => $data['exerciseId'],
                'comment' => $data['comment'],
            ]);
        } else {
            $this->session->records()->create([
                'weight' => $data['weight'],
                'reps' => $data['reps'],
                'exercise_id' => $data['exerciseId'],
                'comment' => $data['comment'],
            ]);
        }

        $this->redirect(route('sessions.show', ['session' => $this->session]), true);
    }

    public function render()
    {
        return view('livewire.record-form');
    }
}
