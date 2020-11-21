<div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>

                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.show.profile', $user->id) }}">Profile</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop.index') }}">Shop |</a>
                    </li>

                    {{--                    <a href="{{ route('categories.single', $category->slug) }}">{{ $category->name }}</a>--}}
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ $category->category }}</a>
                        </li>
                    @endforeach

                    @if(!Auth::check())
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

</div>
