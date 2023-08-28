<?php

namespace App\Livewire;

use App\Models\Record;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RecordForm extends Component
{
    public ?Record $record = null;

    public $exercisesSessions = [];

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
        $prefillRecord = $this->record ?? $this->session->lastRecord ?? null;

        if ($prefillRecord) {
            $this->prefillFormFromRecord($prefillRecord, $this->record !== null);
            $this->updateExercisesData();
        }
    }

    /**
     * Set properties for the form from the record property.
     *
     * The record property might be null in 'create' view or in 'edit' view
     * when there is no record in session yet.
     */
    private function prefillFormFromRecord(Record $record, bool $isEdit = false): void
    {
        $this->exerciseId = $record?->exercise_id;
        $this->weight = $record?->weight;
        $this->reps = $record?->reps;

        if ($isEdit) {
            $this->comment = $record?->comment;
        }
    }

    public function updateExercisesData()
    {
        $user = auth()->user();

        $this->exercisesSessions = $user->sessions()->with('records')->whereHas('records', function (Builder $query) {
            $query->where('exercise_id', $this->exerciseId);
        })
            ->get();
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
