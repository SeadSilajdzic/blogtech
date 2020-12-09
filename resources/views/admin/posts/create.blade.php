@extends('layouts.admin')

@section('content')
    <h1 class="d-sm-flex align-items-center justify-content-between mb-4">Create post</h1>

    @include('includes._errors')
    @include('includes._sessions')

    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="Add custom slug for this post or leave empty (will be generated automatically)" value="{{ old('slug') }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option selected disabled>Choose posts category</option>
                @foreach($categories as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Select tags</label>
            @foreach($tags as $tag)
                <div class="form-check">
                    <input type="checkbox" name="tags[]" class="form-check-input" id="tags" value="{{ $tag->id }}">
                    <label for="tags" class="form-check-label">{{ $tag->tag }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="body">Content</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control mytinytext">{{ old('body') }}</textarea>
        </div>

        <div class="custom-file mb-4">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-outline-success" name="btn_create_post">Create post</button>
        </div>
    </form>

    @include('includes._errors')

@endsection
