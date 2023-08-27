<?php

namespace App\Livewire;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ExerciseForm extends Component
{
    public ?Exercise $exercise = null;

    public Collection $categories;

    #[Rule(['required', 'string'])]
    public $name;

    #[Rule(['required', 'exists:categories,id'])]
    public $category_id = null;

    public function mount()
    {
        if ($this->exercise) {
            $this->name = $this->exercise->name;
            $this->category_id = $this->exercise->category_id;
        }
    }

    public function submit()
    {
        $validated = $this->validate();

        if ($this->exercise) {
            $this->authorize('update', $this->exercise);

            $this->exercise->update($validated);
        } else {
            Exercise::create($validated);
        }

        $this->redirect(route('exercises.index'), true);
    }

    public function render()
    {
        return view('livewire.exercise-form');
    }
}
