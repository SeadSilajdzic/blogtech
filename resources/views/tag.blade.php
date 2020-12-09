@extends('layouts.home')

@section('content')

    <main class="blog-standard">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp" style="text-transform: capitalize;">Tag: {{ $tag->tag }}</h1>
            <div class="row">
                <div class="col-md-8">
                    @foreach($tag->posts as $post)
                        <article class="blog-post wow fadeInUp">
                        <p class="post-date">{{ $post->created_at->toFormattedDateString() }}</p>
                        <img src="{{ $post->image }}" alt="blog post" class="post-thumbnail">
                        <h4 class="post-title">{{ $post->title }}</h4>
                        <p class="post-excerpt">{!! Str::limit($post->body, 300) !!}</p>
                        <div class="post-tags wow fadeInUp">
                            @foreach($post->tags as $tag)
                                <a href="{{ route('tag', $tag->slug) }}" class="post-tag">{{ $tag->tag }}</a>
                            @endforeach
                        </div>
                        <a href="{{ route('show.single', $post->slug) }}" class="post-permalink">READ MORE</a>
                    </article>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Tags</h5>
                        <div class="widget-content">
                            @foreach($tags as $tag)
                                <a href="{{ route('tag', $tag->slug) }}" class="post-tag">{{ $tag->tag }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Categories</h5>
                        <div class="widget-content">
                            <ul class="category-list">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('category', $category->slug) }}">{{ $category->category }} <span class="badge badge-secondary">{{ $category->posts->count() }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
