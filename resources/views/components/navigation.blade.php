<div>
    <!-- Navigation -->
    <header class="oleez-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand font-weight-bold" href="{{ route('home') }}">{{ config('app.name', 'Digy Studio') }}</a>
            <ul class="nav nav-actions d-lg-none ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#!" data-toggle="searchModal">
                        <img src="{{ asset('home-template/assets/images/search.svg') }}" alt="search">
                    </a>
                </li>
                <li class="nav-item nav-item-cart">
                    <a class="nav-link" href="#!">
                        <span class="cart-item-count">0</span>
                        <img src="{{ asset('home-template/assets/images/shopping-cart.svg') }}" alt="cart">
                    </a>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a class="nav-link dropdown-toggle" href="#!" id="languageDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">ENG</a>
                    <div class="dropdown-menu" aria-labelledby="languageDropdown">
                        <a class="dropdown-item" href="#!">ARB</a>
                        <a class="dropdown-item" href="#!">FRE</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!" data-toggle="offCanvasMenu">
                        <img src="{{ asset('home-template/assets/images/social icon@2x.svg') }}" alt="social-nav-toggle">
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav"
                    aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="oleezMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="{{ route('portfolio') }}" class="nav-link">Portfolio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                    </li>

                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.show.profile', $user->id) }}">Profile</a>
                        </li>
                    @endif

                    @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endif

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="about.html">About</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#!" id="pagesDropdown" data-toggle="dropdown"--}}
{{--                           aria-haspopup="true" aria-expanded="false">Pages</a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">--}}
{{--                            <a class="dropdown-item" href="shop.html">Shop</a>--}}
{{--                            <a class="dropdown-item" href="contact.html">Contact</a>--}}
{{--                            <a class="dropdown-item" href="404.html">404</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#!" id="portfolioDropdown" data-toggle="dropdown"--}}
{{--                           aria-haspopup="true" aria-expanded="false">Portfolio</a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="portfolioDropdown">--}}
{{--                            <a class="dropdown-item" href="portfolio-list.html">Portfolio list</a>--}}
{{--                            <a class="dropdown-item" href="portfolio.html">Portfolio grid</a>--}}
{{--                            <a class="dropdown-item" href="portfolio-masonry.html">Portfolio masonry</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                </ul>
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item">
                        <!-- Search box -->
                        @livewire('search-bar')
                    </li>
                    <li class="nav-item nav-item-cart">
                        <a class="nav-link nav-link-btn" href="#!">
                            <span class="cart-item-count">0</span>
                            <img src="{{ asset('home-template/assets/images/shopping-cart.svg') }}" alt="cart">
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#!" id="languageDropdown" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">ENG</a>
                        <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a class="dropdown-item" href="#!">ARB</a>
                            <a class="dropdown-item" href="#!">FRE</a>
                        </div>
                    </li>
                    <li class="nav-item ml-5">
                        <a class="nav-link pr-0 nav-link-btn" href="#!" data-toggle="offCanvasMenu">
                            <img src="{{ asset('home-template/assets/images/social icon@2x.svg') }}" alt="social-nav-toggle">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</div>
