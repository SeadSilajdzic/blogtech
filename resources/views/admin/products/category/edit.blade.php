@extends('layouts.admin')

@section('content')

    <h2>Edit products category</h2>

    <form action="{{ route('product-category.update', $category->slug) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_category">Category</label>
            <input type="text" name="product_category" class="form-control" value="{{ $category->product_category }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}"
                   placeholder="Input custom slug for this category or leave empty to get it filled automatically">
        </div>

        <div class="form-group">
            <button type="submit" name="btn_edit_products_category" class="btn btn-block btn-success">Update product category</button>
        </div>
    </form>

@endsection
