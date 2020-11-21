<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoriesWidget extends Component
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
        $categories_left = Category::orderByDesc('created_at')->take(4)->get();
        $categories_right = Category::orderByDesc('created_at')->skip(4)->take(4)->get();
        return view('components.categories-widget', [
            'categories_left' => $categories_left,
            'categories_right' => $categories_right
        ]);
    }
}
