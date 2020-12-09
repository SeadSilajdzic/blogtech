<div>
    <div>
        <!-- Blog Post -->
        <main class="blog-grid-page">
            <div class="container">
                <h1 class="oleez-page-title wow fadeInUp">Blog</h1>
                @if(count($posts) > 0)
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-4">
                                <div class="blog-post-card wow fadeInUp">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ $post->image }}" alt="{{ $post->title }} image">
                                    </div>
                                    <p class="blog-post-date">{{ $post->created_at->toFormattedDateString() }}</p>
                                    <h5 class="blog-post-title"><a href="{{ route('show.single', $post->slug) }}">{{ $post->title }}</a></h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 pb-5 mb-5">
{{--                            <nav class="oleez-pagination d-flex align-items-center justify-content-center wow fadeInUp">--}}
                            {{ $posts->links('pagination-design') }}
{{--                            </nav>--}}
                        </div>
                    </div>
                @else
                    <h1 class="text-center">Welcome to {{ config('app.name') }}</h1>
                    <h4 class="text-center">There are no posts yet!</h4>
                @endif
            </div>
        </main>
    </div>

</div>
