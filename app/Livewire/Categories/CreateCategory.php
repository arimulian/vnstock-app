<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateCategory extends Component
{
    #[Rule('required|unique:categories')]
    public $name;

    public function save()
    {
        $this->validate();
        Category::query()
            ->create([
                'name' => $this->name,
            ]);
        return redirect()->route('category.list')
            ->with('status', 'Category created successfully');
    }

    #[Title('Create Category✨')]
    public function render()
    {
        return view('livewire.categories.create-category');
    }
}
