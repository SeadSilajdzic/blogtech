@extends('layouts.admin')

@section('content')
    <h2>Tags</h2>

    @include('includes._errors')
    @include('includes._sessions')

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tag</th>
            <th>Slug</th>
            <th>Created</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->tag }}</td>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->created_at->toFormattedDateString() }}</td>
                <td><a href="{{ route('tag.edit', $tag->slug) }}" class="btn btn-sm btn-info" style="color:white;">Edit</a></td>
                <td>
                    <form action="{{ route('tag.destroy', $tag->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" name="btn_delete_tag" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <hr>

    <h2>Add new tag</h2>

    <form action="{{ route('tag.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="tag">Tag name</label>
            <input type="text" name="tag" class="form-control">
        </div>

        <div class="form-group">
            <label for="slug">Tag slug</label>
            <input type="text" name="slug" class="form-control" placeholder="Type your custom slug for this tag or leave empty to generate automatically">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success" name="btn_add_tag">Add new tag</button>
        </div>
    </form>

    @include('includes._errors')
@endsection
