<?php

namespace App\Livewire\Pages\Categories;

use App\Models\Category;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateCategory extends Component
{
    #[Rule(['required', 'string'])]
    public $name;

    public function storeCategory()
    {
        $validated = $this->validate();

        Category::create($validated);

        $this->redirect(route('home'), true);
    }

    public function render()
    {
        return view('livewire.pages.categories.create-category');
    }
}
