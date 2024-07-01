<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProduct extends Component
{
    use WithFileUploads;

    #[Locked]
    public int $id;
    public ProductForm $form;
    public Product $product;

    public function mount()
    {
        $this->id = $this->product->id;
        $this->form->name = $this->product->name;
        $this->form->size = $this->product->size;
        $this->form->price = $this->product->price;
        $this->form->category_id = $this->product->category_id;
        $this->form->description = $this->product->description;
    }

    public function update()
    {
        $this->validate();
        $image = $this->product->image;
        if ($this->form->image != null) {
            Storage::delete($this->product->image);
            $image = Storage::putFile('images', $this->form->image);
        }
        Product::query()
            ->where('id', $this->id)
            ->update([
                'name' => $this->form->name,
                'size' => $this->form->size,
                'price' => $this->form->price,
                'category_id' => $this->form->category_id,
                'description' => $this->form->description,
                'image' => $image,
            ]);
        session()->flash('message', 'Product updated successfully');
        return redirect()->route('product.list');
    }


    public function render()
    {
        $product = Product::with('categories')->where('id', $this->id)->first();
        $categories = Category::all('id', 'name');
        return view('livewire.products.update-product', compact('product', 'categories'));
    }
}
