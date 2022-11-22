<?php

namespace App\Orchid\Screens\Product;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ProductEditScreen extends Screen
{
    /**
     * @var Product
     */
    public $product;
    /**
     * @param Product $product
     *
     * @return array
     */
    public function query(Product $product): iterable
    {
        return [
            'product' => $product
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->product->exists ? 'Edit product' : 'Creating a new product';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Products";
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Create product')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->product->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->product->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->product->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('product.name')
                    ->title('name')
                    ->placeholder('Attractive but mysterious name')
                    ->help('Specify a short descriptive title for this product.'),
            ])
        ];
    }

    /**
     * @param Product    $product
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Product $product, Request $request)
    {
        $product->fill($request->get('product'))->save();

        Alert::info('You have successfully created a product.');

        return redirect()->route('platform.product.list');
    }

    /**
     *@param Product    $product
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Product $product)
    {
        $product->delete();

        Alert::info('You have successfully deleted the product.');

        return redirect()->route('platform.product.list');
    }
}
