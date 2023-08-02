<?php

namespace App\Livewire\Pages\Sessions;

use App\Models\Session;
use Carbon\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    #[Rule(['required', 'date'])]
    public $date;

    public function mount(): void
    {
        $this->date = today()->toDateString();
    }

    public function startSession(): void
    {
        $this->validate();

        $session = Session::create([
            'date' => Carbon::parse($this->date)
        ]);

        $this->redirect(route('sessions.show', ['session' => $session]), true);
    }

    public function render()
    {
        return view('livewire.pages.sessions.create');
    }
}
