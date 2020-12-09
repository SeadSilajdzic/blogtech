<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsDisplay extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Post::orderByDesc('created_at')->where('published', 1)->paginate(6);
        return view('livewire.posts-display', [
            'posts' => $posts
        ]);
    }
}
