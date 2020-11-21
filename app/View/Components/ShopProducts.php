<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class ShopProducts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')->where('published', 1)->get();
        return view('components.shop-products', [
            'products' => $products
        ]);
    }
}
