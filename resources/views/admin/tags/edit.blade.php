@extends('layouts.admin')

@section('content')

    <h2>Edit tag</h2>

    <form action="{{ route('tag.update', $tag->slug) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tag">Tag name</label>
            <input type="text" name="tag" class="form-control" value="{{ $tag->tag }}">
        </div>

        <div class="form-group">
            <label for="slug">Tag slug</label>
            <input type="text"
                   name="slug"
                   class="form-control"
                   placeholder="Type your custom slug for this tag or leave empty to generate automatically">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-info" style="color: white;" name="btn_edit_tag">Edit tag</button>
        </div>
    </form>

@endsection
