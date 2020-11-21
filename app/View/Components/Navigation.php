<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Navigation extends Component
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
        $user = auth()->user();
        $categories = Category::take(4)->get();
        return view('components.navigation', [
            'categories' => $categories,
            'user' => $user
        ]);
    }
}
