<?php

namespace App\Livewire\Pages\Exercises;

use App\Models\Category;
use App\Models\Exercise;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateExercise extends Component
{
    public $categories;

    #[Rule(['required', 'string'])]
    public $name;

    #[Rule(['required', 'exists:categories,id'])]
    public $category_id = null;

    public function mount(): void
    {
        $this->categories = Category::all();
    }

    public function storeExercise(): void
    {
        $validated = $this->validate();

        Exercise::create($validated);

        $this->redirect(route('home'), true);
    }

    public function render()
    {
        return view('livewire.pages.exercises.create-exercise');
    }
}
