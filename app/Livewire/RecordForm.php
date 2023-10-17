<?php

namespace App\Livewire;

use App\Actions\CreateRecordForSession;
use App\Actions\UpdateRecord;
use App\Models\Exercise;
use App\Models\Record;
use App\Models\Session;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RecordForm extends Component
{
    public ?Record $record = null;

    public Exercise $exercise;

    /** @var Collection<Record> */
    public Collection $sessionRecords;

    public Session $session;

    public bool $isEditing = false;

    #[Rule(['required', 'numeric', 'min:0'])]
    public ?float $weight;

    #[Rule(['required', 'numeric', 'min:0'])]
    public ?int $reps;

    #[Rule(['nullable', 'string'])]
    public ?string $comment;

    public function mount()
    {
        $prefillRecord = $this->exercise->lastRecord;
        $this->getSessionRecords();

        if ($prefillRecord) {
            $this->prefillFormFromRecord($prefillRecord, $this->record !== null);
        }
    }

    /**
     * @return void
     */
    public function getSessionRecords(): void
    {
        $this->sessionRecords = $this->exercise->records()->where('session_id', $this->session->id)->get();
    }

    /**
     * Set properties for the form from the record property.
     *
     * The record property might be null in 'create' view or in 'edit' view
     * when there is no record in session yet.
     */
    private function prefillFormFromRecord(Record $record, bool $isEdit = false): void
    {
        $this->weight = $record?->weight;
        $this->reps = $record?->reps;

        if ($isEdit) {
            $this->comment = $record?->comment;
        }
    }

    public function submit(): void
    {
        $data = $this->validate();

        if ($this->isEditing) {
            $this->authorize('update', $this->record);

            $record = app(UpdateRecord::class)->execute(
                $this->record,
                $this->exercise,
                $data['weight'],
                $data['reps'],
                $data['comment']
            );

            if ($record->is_pr && !$this->record->is_pr) {
                Notification::make()
                    ->title("New {$record->reps} reps PR!")
                    ->success()
                    ->send();
            }

            $this->isEditing = false;
            $this->comment = null;
            $this->record = null;
        } else {
            $record = app(CreateRecordForSession::class)->execute(
                $this->session,
                $this->exercise,
                $data['weight'],
                $data['reps'],
                $data['comment'],
            );

            if ($record->is_pr) {
                Notification::make()
                    ->title("New {$record->reps} reps PR!")
                    ->success()
                    ->send();
            }
        }

        $this->getSessionRecords();
    }

    public function cancelEditing(): void
    {
        $this->record = null;
        $this->isEditing = false;
    }

    public function editRecord(int $recordId): void
    {
        $this->record = $this->sessionRecords->find($recordId);
        $this->isEditing = true;
        $this->prefillFormFromRecord($this->record, true);
    }

    public function deleteRecord(int $recordId): void
    {
        $this->cancelEditing();
        $this->sessionRecords->find($recordId)->delete();
        $this->getSessionRecords();
    }

    public function render()
    {
        return view('livewire.record-form');
    }
}
