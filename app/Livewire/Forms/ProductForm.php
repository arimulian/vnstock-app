<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProductForm extends Form
{
    use WithFileUploads;

    #[Rule('required')]
    public $name = "";
    #[Rule('required|max:20')]
    public $size = "";
    #[Rule('required|numeric|not_in:0')]
    public $price = "";
    public $description = "";
    #[Rule('required')]
    public $category_id = "";
    #[Rule('nullable|max:1024|mimes:jpg,jpeg,png')]
    public $image;


    public function stores()
    {
        $slug = Str::slug($this->name);
        $image = null;
        if ($this->image != null) {
            $image = Storage::putFile('images', $this->image);
        }
        Product::query()
            ->create([
                'slug' => $slug,
                'name' => $this->name,
                'size' => $this->size,
                'price' => $this->price,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'image' => $image,
            ]);
    }

}
