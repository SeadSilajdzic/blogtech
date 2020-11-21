@extends('layouts.admin')

@section('content')

    <h2>New Product</h2>

    @include('includes._errors')
    @include('includes._sessions')

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Product title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Make custom slug for this product or leave empty to get it generated automatically">
        </div>

        <div class="form-group">
            <label for="product_category_id">Product category</label>
            <select name="product_category_id" id="product_category_id" class="form-control">
                <option selected disabled>Select products category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->product_category }}</option>
                @endforeach
            </select>
        </div>

        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="description">Product description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" name="btn_create_product" class="btn btn-block btn-success">Add product</button>
        </div>
    </form>

    @include('includes._errors')

@endsection
