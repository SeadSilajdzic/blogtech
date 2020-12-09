<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class AdminSearchForm extends Component
{

    public $query;
    public $posts;
    public $users;
    public $categories;

    public function mount()
    {
        $this->query = '';
        $this->posts = [];
        $this->users = [];
        $this->categories = [];
    }

    public function updatedQuery()
    {
        $this->posts = Post::where('title', 'like', '%' . $this->query . '%')->get()->toArray();
        $this->users = User::where('name', 'like', '%' . $this->query . '%')->get()->toArray();
        $this->categories = Category::where('category', 'like', '%' . $this->query . '%')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.admin-search-form');
    }
}
