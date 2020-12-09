<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::firstOrFail();
        return view('index', compact('settings'));
    }

    public function blog()
    {
        return view('blog');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    public function tag(Tag $tag)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('tag', [
            'tag' => $tag,
            'tags' => $tags,
            'categories' => $categories
        ]);
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('category', [
            'category' => $category,
            'tags' => $tags,
            'categories' => $categories
        ]);
    }
}
