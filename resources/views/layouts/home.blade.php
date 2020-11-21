<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('home-template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('home-template/css/blog-home.css') }}" rel="stylesheet">

</head>

<body>

<x-navigation></x-navigation>

<!-- Page Content -->
<div class="container">

    @yield('full-page')

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            @yield('content')

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            @yield('sidebar')

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@yield('footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('home-template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('home-template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
