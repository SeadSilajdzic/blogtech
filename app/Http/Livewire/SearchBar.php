<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchBar extends Component
{
    public $query;
    public $posts;

    public function mount()
    {
        $this->query = '';
        $this->posts = [];
    }

    public function updatedQuery()
    {
        $this->posts = Post::where('title', 'like', '%' . $this->query . '%')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
