<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class PostsDisplay extends Component
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
        $posts = Post::orderByDesc('created_at')->where('published', 1)->get();
        return view('components.posts-display', [
            'posts' => $posts
        ]);
    }
}
