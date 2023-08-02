<?php

namespace App\Livewire\Pages;

use App\Models\Session;
use Livewire\Component;

class Home extends Component
{
    /** @var Session[] $sessions */
    private $sessions;

    public function mount(): void
    {
        $this->sessions = Session::all();
    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
