<?php

namespace App\Http\Livewire;

use App\Models\Product;
use League\CommonMark\Extension\TableOfContents\Normalizer\AsIsNormalizerStrategy;
use Livewire\Component;
use Orchid\Support\Facades\Alert;

class Products extends Component
{
    public function reorder($orderIds)
    {
      // dd($orderIds);
//        Product::whereIn("id", $orderIds)
//            ->update([
//                'order_position' => array_values($orderIds),
//            ]);
        $products = Product::find($orderIds);
        foreach ($products as $product) {
           $product->update(['order_position' => $product->order_position]);
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
