<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageCategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('posts')->get();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageCategoriesRequest $request)
    {
        $categories = Category::all();
        if($categories->count() <= 7)
        {
            $slug = Str::slug($request->input('slug'));
            if(empty($slug))
            {
                $slug = Str::slug($request->input('category'));
            }

            Category::create([
                'category' => $request->category,
                'slug' => $slug
            ]);

            $request->session()->flash('category_created', 'Category has been created');
            return redirect()->back();
        }
        else
        {
            $request->session()->flash('too_many_categories_error', 'You can not have more then 8 categories!');
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageCategoriesRequest $request, Category $category)
    {
        $slug = Str::slug($request->input('slug'));
        if(empty($slug))
        {
            $slug = Str::slug($request->input('category'));
        }

        $category->category = $request->category;
        $category->slug = $slug;
        $category->save();

        $request->session()->flash('category_updated', 'Category has been updated');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $categories = Category::all();
        if($categories->count() == 1)
        {
            $request->session()->flash('last_category_error', 'This is your last category. Make new one before you can delete this one!');
            return redirect()->back();
        }
        else {
            $category = Category::findOrFail($id);
            $category->delete();

            $request->session()->flash('category_deleted', 'Category has been deleted');
            return redirect()->back();
        }
    }
}
