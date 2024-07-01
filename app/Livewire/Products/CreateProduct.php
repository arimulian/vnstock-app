<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public ProductForm $form;

    public function save()
    {
        $this->validate();
        $this->form->stores();
        return redirect()->route('product.list')
            ->with('status', 'successful create product');
    }

    #[Title('Create Product✨')]
    public function render()
    {
        $category = Category::all('id', 'name');
        return view('livewire.products.create-product', ['categories' => $category]);
    }
}
