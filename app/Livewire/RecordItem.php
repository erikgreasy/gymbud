<?php

namespace App\Livewire;

use App\Models\Record;
use Livewire\Component;

class RecordItem extends Component
{
    public ?Record $record;

    public function deleteRecord()
    {
        $this->record->delete();
    }

    public function render()
    {
        return view('livewire.record-item');
    }
}
