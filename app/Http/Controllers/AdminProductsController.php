<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageProductsRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('created_at')->get();
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_category = ProductCategory::all();
        return view('admin.products.create', [
            'categories' => $product_category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageProductsRequest $request)
    {
        $product_image = $request->image;
        $product_image_name = time() . $product_image->getClientOriginalName();
        $product_image->move('uploads/products/images', $product_image_name);

        $slug = Str::slug($request->input('slug'));
        if(empty($slug))
        {
            $slug = Str::slug($request->input('title'));
        }

        Product::create([
            'product_category_id' => $request->product_category_id,
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'image' => '/uploads/products/images/' . $product_image_name,
            'published' => false
        ]);

        $request->session()->flash('product_created', 'Product has been created');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        if($request->hasFile('image')) {
//            $post_image = $request->image;
//            $post_image_name = time() . $post_image->getClientOriginalName();
//            $post_image->move('uploads/posts/images', $post_image_name);
//            $post->image = '/uploads/posts/images/' . $post_image_name;
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->firstOrFail();
        $product->forceDelete();

        $request->session()->flash('product_deleted', 'Product has been deleted');
        if(Product::onlyTrashed()->count() > 0)
        {
            return redirect()->back();
        }
        else
        {
            return redirect()->route('product.index');
        }
    }

    public function trash(Request $request,$id)
    {
        $product = Product::withoutTrashed()->where('id', $id)->firstOrFail();
        $product->delete();

        $request->session()->flash('product_trashed', 'Product has been trashed');
        return redirect()->back();
    }

    public function restore(Request $request, $id)
    {
        $product = Product::withTrashed()->where('id', $id)->firstOrFail();
        $product->restore();

        $request->session()->flash('product_restored', 'Product has been restored');
        if(Product::onlyTrashed()->count() > 0)
        {
            return redirect()->back();
        }
        else
        {
            return redirect()->route('product.index');
        }
    }

    public function trashed()
    {
        $products = Product::orderByDesc('created_at')->onlyTrashed()->get();
        return view('admin.products.trashed', [
            'products' => $products
        ]);
    }

    public function publish(Product $product)
    {
        $product->published = true;
        $product->save();
        return redirect()->back();
    }

    public function rm_publish(Product $product)
    {
        $product->published = false;
        $product->save();
        return redirect()->back();
    }
}
