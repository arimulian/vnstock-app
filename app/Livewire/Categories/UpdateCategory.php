<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateCategory extends Component
{

    #[Locked]
    public $id;
    #[Validate('required|unique:categories')]
    public $name;

    public function mount(Category $category)
    {
        $this->id = $category->id;
        $this->name = $category->name;
    }

    public function update()
    {
        $this->validate();
        Category::query()
            ->find($this->id)->fill($this->all())
            ->save();
        session()->flash('status', 'Category updated successfully');
        return redirect()->route('category.list');
    }


    #[Title('Update Category✨')]
    public function render()
    {
        return view('livewire.categories.update-category', ['category' => Category::query()->where('name', '=',
            $this->name)->first()]);
    }
}
