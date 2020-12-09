<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Digy Studio') }}</title>
    <link rel="stylesheet" href="{{ asset('home-template/assets/vendors/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home-template/assets/vendors/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('home-template/assets/vendors/slick-carousel/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('home-template/assets/css/style.css') }}">
    <script src="{{ asset('home-template/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('home-template/assets/js/loader.js') }}"></script>
    @livewireStyles
</head>

<body>
<div class="oleez-loader"></div>
<x-navigation></x-navigation>

<main>
    @yield('content')
</main>

<x-footer></x-footer>

<!-- Modals -->
<!-- Off canvas social menu -->
<nav id="offCanvasMenu" class="off-canvas-menu">
    <button type="button" class="close" aria-label="Close" data-dismiss="offCanvasMenu">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="oleez-social-menu">
        <li>
            <a href="#!" class="oleez-social-menu-link">Facebook</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Instagram</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Behance</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Dribbble</a>
        </li>
        <li>
            <a href="#!" class="oleez-social-menu-link">Email</a>
        </li>
    </ul>
</nav>


{{--TinyMCE--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.1/tinymce.min.js" integrity="sha512-RAKGi5Lz3BrsIKXW8sSbTM2sgNbf5m3n7zApdXDTL1IH0OvG1Xe1q2yI2R2gTDqsd2PLuQIIiPnDJeOSLikJTA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.1/jquery.tinymce.min.js" integrity="sha512-0+DXihLxnogmlHWg1hVntlqMiGthwA02YWrzGnOi+yNyoD3IA4yDBzxvm+EwTCZeUM4zNy3deF9CbQqQBQx2Yg==" crossorigin="anonymous"></script>

{{--Scripts--}}
<script src="{{ asset('home-template/assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('home-template/assets/vendors/wowjs/wow.min.js') }}"></script>
<script src="{{ asset('home-template/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('home-template/assets/vendors/slick-carousel/slick.min.js') }}"></script>
<script src="{{ asset('home-template/assets/js/main.js') }}"></script>
<script src="{{ asset('home-template/assets/js/landing.js') }}"></script>
<script>
    tinymce.init({
        selector:'#mytinytext'
    });
    new WOW({mobile: false}).init();
</script>

@livewireScripts
</body>
</html>
