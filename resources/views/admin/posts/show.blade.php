@extends('layouts.admin')

@section('content')

    @if($post->published)
        <div class="alert alert-warning text-center d-inline-block">
        <span class="text-muted" style="font-size: 1em;">This page is helping admins to preview posts. This post is published and everybody can see it. <br>
            <strong>Only registered users can comment!</strong></span>
        </div>
        <a href="{{ route('rm.published.post', $post->slug) }}" class="btn btn-danger">Remove from published list</a>
    @else
        <div class="alert alert-warning text-center d-inline-block">
            <span class="text-muted" style="font-size: 1em;">This page is helping admins to preview posts. Until this post gets published only admin can see it. <br>
            <strong>Only registered users can comment!</strong></span>
        </div>
        <a href="{{ route('publish.post', $post->slug) }}" class="btn btn-success">Publish</a>
    @endif

    <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back</a>
    <hr>

    <div class="container-fluid">
        <p class="text-muted">Post created at {{ $post->created_at->toFormattedDateString() }}</p>
        <h2>{{ $post->title }}</h2>
        <img src="{{ $post->image }}" style="width: 100%;" alt="{{ $post->title }} image">
        <p class="lead">{{ Str::limit($post->body, 300) }}</p>
        <p>{!! $post->body !!}</p>
    </div>
    <hr>

    <div>
        <strong> Tags: </strong>
        @foreach($post->tags as $tag)
           <a href="#" class="badge badge-secondary">{{ $tag->tag }}</a>
        @endforeach
    </div>

    <hr>


    <h2 class="my-3">Comments</h2>
    {{--    Comments--}}
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
        </div>
    </div>
@endsection
