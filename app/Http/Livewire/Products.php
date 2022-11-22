<?php

namespace App\Http\Livewire;

use App\Models\Product;
use League\CommonMark\Extension\TableOfContents\Normalizer\AsIsNormalizerStrategy;
use Livewire\Component;

class Products extends Component
{

    public Product $product;
    public function updateTaskOrder($products)
    {
       // dd($products);
        foreach ($products as $product) {
            Product::find($product['value'])->update(['order_position' => $product['order']]);
           // dd('sort was successful');
        }
    }
    public function render()
    {
        $products = Product::query()->orderBy('order_position', 'asc')->get();
       // dd($products);
        return view('livewire.products', [
            'products' => $products
        ]);
    }
}
