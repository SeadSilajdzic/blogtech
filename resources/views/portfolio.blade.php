@extends('layouts.home')

@section('content')

    <main class="portfolio-list">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">Projects</h1>
            <article class="project">
                <div class="row">
                    <div class="col-md-4 mb-5 md-mb-0 project-content wow fadeInLeft">
                        <h2 class="project-title">Simple Design Showcase</h2>
                        <a href="#!" class="project-link">view project</a>
                    </div>
                    <div class="col-md-7 wow fadeInRight">
                        <div class="project-thumbnail-wrapper">
                            <img src="{{ asset('home-template/assets/images/Project_3@2x.jpg') }}" alt="project">
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>

@endsection
