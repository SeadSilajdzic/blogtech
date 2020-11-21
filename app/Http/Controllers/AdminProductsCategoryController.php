<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.products.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.category.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageProductCategoryRequest $request)
    {
        $slug = Str::slug($request->input('slug'));
        if(empty($slug))
        {
            $slug = Str::slug($request->input('product_category'));
        }

        ProductCategory::create([
            'product_category' => $request->product_category,
            'slug' => $slug
        ]);

        $request->session()->flash('product_category_created', 'Product category has been created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $category)
    {
        return view('admin.products.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $category)
    {
        return view('admin.products.category.edit', [
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
    public function update(ManageProductCategoryRequest $request, ProductCategory $category)
    {
        $slug = Str::slug($request->input('slug'));
        if(empty($slug))
        {
            $slug = Str::slug($request->input('product_category'));
        }

        $category->product_category = $request->product_category;
        $category->slug = $slug;

        $request->session()->flash('product_category_updated', 'Product category has been updated');
        return redirect()->route('product-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product_category = ProductCategory::findOrFail($id);
        $product_category->delete();

        $request->session()->flash('product_category_deleted', 'Product category has been deleted');
        return redirect()->route('product-category.index');
    }
}
