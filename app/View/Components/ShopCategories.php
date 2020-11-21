<?php

namespace App\View\Components;

use App\Models\ProductCategory;
use Illuminate\View\Component;

class ShopCategories extends Component
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
        $product_categories = ProductCategory::with('products')->get();
        return view('components.shop-categories', [
            'categories' => $product_categories
        ]);
    }
}
