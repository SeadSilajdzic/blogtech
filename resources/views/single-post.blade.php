@extends('layouts.home')

@section('content')
    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp">{{ $post->title }}</h1>
            <div class="row">
                <div class="col-md-8 blog-post-wrapper">
                    <div class="post-header wow fadeInUp">
                        <img src="{{ $post->image }}" alt="{{ $post->title }} image" class="post-featured-image">
                        <p class="post-date">{{ $post->created_at->toFormattedDateString() }}</p>
                    </div>
                    <div class="post-content wow fadeInUp">
                        {!! $post->body !!}
                    </div>
                    <div class="post-tags wow fadeInUp">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('tag', $tag->slug) }}" class="post-tag">{{ $tag->tag }}</a>
                        @endforeach
                    </div>
                    <div class="post-navigation wow fadeInUp">
                        <button class="btn prev-post"> Prev Post</button>
                        <button class="btn next-post"> Next Post</button>
                    </div>
                    <div class="comment-section wow fadeInUp">
                        <h5 class="section-title">Leave a Reply</h5>
                        <form action="POST" class="oleez-comment-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="oleez-input" id="fullName" name="fullName" required>
                                    <label for="fullName">*Full name</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="oleez-input" id="fullName" name="email" required>
                                    <label for="email">*Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="message">*Message</label>
                                    <textarea name="message" id="message" rows="10" class="oleez-textarea" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                    {{--                    <div class="sidebar-widget wow fadeInUp">--}}
                    {{--                        <h5 class="widget-title">Share</h5>--}}
                    {{--                        <div class="widget-content">--}}
                    {{--                            <nav class="social-links">--}}
                    {{--                                <a href="#!">Fb</a>--}}
                    {{--                                <a href="#!">Tw</a>--}}
                    {{--                                <a href="#!">In</a>--}}
                    {{--                                <a href="#!">Be</a>--}}
                    {{--                            </nav>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
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
