@extends('layouts.home')

@section('full-page')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <x-single-post :post="$post"></x-single-post>

                <x-comments></x-comments>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <x-sidebar></x-sidebar>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection
