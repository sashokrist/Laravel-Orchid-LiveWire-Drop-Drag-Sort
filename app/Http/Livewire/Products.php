<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use League\CommonMark\Extension\TableOfContents\Normalizer\AsIsNormalizerStrategy;
use Livewire\Component;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Toast;

class Products extends Component
{
    public function reorder($orderIds)
    {
        foreach ($orderIds as $id) {
            $product = Product::find(($id['order']));
            $product->update(['order_position' => $id['value']]);
        }
        Alert::info('reorder done.');
       // redirect((new \Illuminate\Http\Request)->url());
    }
    public function render()
    {
        $products = Product::query()->orderBy('order_position', 'asc')->get();

        return view('livewire.products', [
            'products' => $products
        ]);
    }
}
