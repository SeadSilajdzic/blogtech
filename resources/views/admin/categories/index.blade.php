@extends('layouts.admin')

@section('content')
    <h2>Categories</h2>

    @include('includes._errors')
    @include('includes._sessions')

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Slug</th>
            <th>Created</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->created_at->toFormattedDateString() }}</td>
                <td><a href="{{ route('category.edit', $category->slug) }}" class="btn btn-sm btn-info" style="color:white;">Edit</a></td>
                <td>
                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" name="btn_delete_category" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <hr>

    <h2>Add new category</h2>

    <form action="{{ route('category.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="category">Category name</label>
            <input type="text" name="category" class="form-control">
        </div>

        <div class="form-group">
            <label for="slug">Categories slug</label>
            <input type="text" name="slug" class="form-control" placeholder="Type your custom slug for this category or leave empty to generate automatically">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success" name="btn_add_category">Add new category</button>
        </div>
    </form>

    @include('includes._errors')
@endsection
