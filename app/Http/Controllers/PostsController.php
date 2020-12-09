<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Post $post)
    {
        $categories = Category::with('posts')->get();
        $tags = Tag::all();
        return view('single-post', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

}
