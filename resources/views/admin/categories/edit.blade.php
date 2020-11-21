@extends('layouts.admin')

@section('content')

    <h2>Edit category</h2>

    <form action="{{ route('category.update', $category->slug) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="category">Category name</label>
            <input type="text" name="category" class="form-control" value="{{ $category->category }}">
        </div>

        <div class="form-group">
            <label for="slug">Categories slug</label>
            <input type="text"
                   name="slug"
                   class="form-control"
                   placeholder="Type your custom slug for this category or leave empty to generate automatically"
                   value="{{ $category->slug }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-info" style="color: white;" name="btn_edit_category">Edit category</button>
        </div>
    </form>

@endsection
