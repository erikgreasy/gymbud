<?php

namespace App\Livewire;

use App\Models\Session;
use Carbon\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Component;

class NewSessionForm extends Component
{
    #[Rule(['required', 'date'])]
    public $date;

    public function mount()
    {
        $this->date = today()->toDateString();
    }

    public function submit()
    {
        $this->validate();

        $session = Session::create([
            'date' => Carbon::parse($this->date)
        ]);

        $this->redirect(route('sessions.show', ['session' => $session]), true);
    }

    public function render()
    {
        return view('livewire.new-session-form');
    }
}
