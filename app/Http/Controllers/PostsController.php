<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Post $post)
    {
        return view('single-post', [
            'post' => $post
        ]);
    }

}
