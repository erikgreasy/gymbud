<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CategoryForm extends Component
{
    public ?Category $category = null;

    #[Rule(['required', 'string'])]
    public $name;

    public function mount()
    {
        if ($this->category) {
            $this->name = $this->category->name;
        }
    }

    public function submit()
    {
        $validated = $this->validate();

        if ($this->category) {
            $this->authorize('update', $this->category);

            $this->category->update($validated);
        } else {
            Category::create($validated);
        }

        $this->redirect(route('categories.index'), true);
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}
