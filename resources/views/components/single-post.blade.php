<div>
    <!-- Title -->

    <h1 class="mt-4">{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{ $post->created_at->toFormattedDateString() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{ $post->image }}" alt="Post featured image">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{ Str::limit($post->body, 300) }}</p>

    <p>{{ $post->body }}</p>

    <hr>
</div>
