@extends('layouts.admin')

@section('content')
    <h1 class="d-sm-flex align-items-center justify-content-between mb-4">All posts</h1>

    @include('includes._sessions')

    <div class="d-flex justify-content-center my-3">
        {{ $posts->links() }}
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Category</th>
            <th>Created</th>
            <th>Published</th>
            <th>Restore</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><img src="{{$post->image}}" style="height: 120px; width: 200px;" alt="{{ $post->title }} image"></td>
                <td><a href="{{ route('post.show', $post->slug) }}">{{$post->title}}</a></td>
                <td>{{ $post->category->category }}</td>
                <td>{{$post->created_at->toFormattedDateString()}}</td>
                <td><a href="{{ route('post.show', $post->slug) }}">{{ $post->published == true ? 'Published' : 'Not Published' }}</a></td>
                <td>
                    <form action="{{ route('restore.post', $post->id) }}" method="get">
                        @csrf

                        <button type="submit" name="btn_restore_post" class="btn btn-success btn-sm">Restore</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" name="btn_destroy_post" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center my-5">
        {{ $posts->links() }}
    </div>
@endsection
