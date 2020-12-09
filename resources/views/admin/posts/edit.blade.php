@extends('layouts.admin')

@section('content')
    <h2 class="d-sm-flex align-items-center justify-content-between mb-4">{{ $post->title }}</h2>

    <form action="{{ route('post.update', $post->slug) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="Add custom slug for this post or leave empty (will be generated automatically)">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option disabled>Choose posts category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if($post->category->id == $category->id)
                            selected
                        @endif> {{ $category->category }} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Select tags</label>
            @foreach($tags as $tag)
                <div class="form-check">
                    <input type="checkbox" name="tags[]" class="form-check-input" id="tags" value="{{ $tag->id }}"
                    @foreach($post->tags as $t)
                        @if($tag->id == $t->id)
                            checked
                       @endif
                    @endforeach>
                    <label for="tags" class="form-check-label">{{ $tag->tag }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="body">Content</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control mytinytext">{{ $post->body }}</textarea>
        </div>

        <div class="custom-file mb-4">
            <input type="file" class="custom-file-input" id="body">
            <label class="custom-file-label" for="body">Choose file</label>
        </div>

        <div class="form-group">
            <button class="btn btn-block btn-info" style="color: white;" name="btn_create_post">Edit post</button>
        </div>
    </form>
@endsection
