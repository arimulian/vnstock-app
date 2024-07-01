<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ListProduct extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function destroy($id)
    {
        $product = Product::query()->where('id', $id)->first();
        $product->delete();
        if ($product->image != null) {
            Storage::delete($product->image);
        }
        session()->flash('status', 'Product has been deleted successfully.');
    }

    #[Title('List Product✨')]
    public function render()
    {
        $products = Product::with('categories')->simplePaginate(10);
        return view('livewire.products.list-product', ['products' => $products, 'total' => Product::query()->count('name')]);
    }
}
