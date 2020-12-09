<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagePostsRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_posts = Post::all();
        $categories = Category::all();

        if($all_posts->count() == 0)
        {
            session()->flash('no_posts', 'There are no posts yet! Make some first.');
            return redirect()->route('post.create');
        }
        else if($categories->count() == 0)
        {
            session()->flash('no_categories', 'There are no categories yet! Make some first.');
            return redirect()->route('category.index');
        }

        $posts = Post::orderByDesc('created_at')->simplePaginate(10);
        return view('admin.posts.index', [
            'posts' => $posts
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category', 'id');
        $tags = Tag::all();

        if($categories->count() == 0)
        {
            session()->flash('no_categories', 'There are no categories yet! Make some first.');
            return redirect()->route('category.index');
        }

        if($tags->count() == 0)
        {
            session()->flash('no_tags', 'There are no tags yet! Make some first.');
            return redirect()->route('tag.index');
        }

        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagePostsRequest $request)
    {
        $post_image = $request->image;
        $post_image_name = time() . $post_image->getClientOriginalName();
        $post_image->move('uploads/posts/images', $post_image_name);

        $slug = Str::slug($request->input('slug'));
        if (empty($slug)) {
            $slug = Str::slug($request->input('title'));
        }

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $slug,
            'body' => $request->body,
            'image' => '/uploads/posts/images/' . $post_image_name,
            'published' => false,
        ]);

        $post->tags()->attach($request->tags);


        $request->session()->flash('post_created', 'Post has been created');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManagePostsRequest $request, Post $post)
    {
        if($request->hasFile('image')) {
            $post_image = $request->image;
            $post_image_name = time() . $post_image->getClientOriginalName();
            $post_image->move('uploads/posts/images', $post_image_name);
            $post->image = '/uploads/posts/images/' . $post_image_name;
        }

        $slug = Str::slug($request->input('slug'));
        if(empty($slug))
        {
            $slug = Str::slug($request->input('title'));
        }

        $post->title = $request->title;
        $post->slug = $slug;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        $request->session()->flash('post_updated', 'Post has been updated');
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->firstOrFail();
        $post->forceDelete();

        if($post->count() > 0)
        {
            return redirect()->back()->with('post_deleted', 'Post has been deleted');
        }
        else
        {
            return redirect()->route('post.index')->with('post_deleted', 'Post has been deleted');
        }
    }

    public function trash_post($id)
    {
        $post = Post::withoutTrashed()->where('id', $id)->firstOrFail();
        $post->delete();

        if($post->count() > 0)
        {
            return redirect()->back()->with('post_trashed', 'Post has been trashed');
        }
        else
        {
            return redirect()->route('post.index')->with('post_restored', 'Post has been restored');
        }

    }

    public function trashed_posts()
    {
        return view('admin.posts.trashed', [
            'posts' => Post::orderByDesc('created_at')->onlyTrashed()->simplePaginate(10)
        ]);
    }

    public function restore_post($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        if($post->count() > 0)
        {
            return redirect()->back()->with('post_restored', 'Post has been restored');
        }
        else
        {
            return redirect()->route('post.index')->with('post_restored', 'Post has been restored');
        }
    }

    public function publish_post(Post $post)
    {
        $post->published = true;
        $post->save();
        return redirect()->back();
    }

    public function remove_published_post(Post $post)
    {
        $post->published = false;
        $post->save();
        return redirect()->back();
    }
}
