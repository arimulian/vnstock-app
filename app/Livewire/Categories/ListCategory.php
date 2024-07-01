<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ListCategory extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function destroy($id)
    {
        Category::query()->find($id)->delete();
        session()->flash('status', 'Category deleted successfully');
    }

    #[Title('List categories✨')]
    public function render()
    {
        return view('livewire.categories.list-category', ['categories' => Category::query()->simplePaginate(5), 'total' => Category::query()->count('name')]);
    }
}
