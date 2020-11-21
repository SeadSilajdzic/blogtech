<div>
@if(count($posts) > 0)
    <!-- Blog Post -->
        <div class="card mb-4">
            @foreach($posts as $post)
                <a href="{{ route('show.single', $post->slug) }}"><img class="card-img-top" src="{{ $post->image }}" alt="Card image cap"></a>
                <div class="card-body">
                    <h2 class="card-title"><a href="{{ route('show.single', $post->slug) }}">{{ $post->title }}</a></h2>
                    <p class="card-text">{{ Str::limit($post->body, 300) }}</p>
                    <a href="{{ route('show.single', $post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $post->created_at->toFormattedDateString() }} by
                    <a href="#">{{ $post->user->name }}</a>
                </div>
            @endforeach
        </div>
    @else
        <h1 class="text-center">Welcome to {{ config('app.name') }}</h1>
        <h4 class="text-center">There are no posts yet!</h4>
    @endif
</div>
