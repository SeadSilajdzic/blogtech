<div>
    <!-- Footer -->
    <footer class="oleez-footer wow fadeInUp">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-md-6">
                        <h3><a class="navbar-brand" style="text-decoration: none; color: white;" href="{{ route('home') }}">{{ $settings->site_name }}</a></h3>
                        <p class="footer-intro-text">{!! $settings->site_description !!}</p>
                        <nav class="footer-social-links">
                            @if(!empty($settings->site_facebook))
                                <a title="Facebook" href="{{ $settings->site_facebook }}">Fb</a>
                            @endif

                            @if(!empty($settings->site_instagram))
                                <a title="Instagram" href="{{ $settings->site_instagram }}">In</a>
                            @endif

                            @if(!empty($settings->site_twitter))
                                <a title="Twitter" href="{{ $settings->site_twitter }}">Tw</a>
                            @endif

                            @if(!empty($settings->site_behance))
                                <a title="Behance" href="{{ $settings->site_behance }}">Be</a>
                            @endif

                            @if(!empty($settings->site_dribbble))
                                <a title="Behance" href="{{ $settings->site_dribbble }}">Dr</a>
                            @endif

                            @if(!empty($settings->site_email))
                                <a title="Email" style="color: white;" href="mailto:{{$settings->site_email}}?subject=Please, change this subject&body=Dear {{$settings->site_name}} ">Em</a>
                            @endif
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title" style="text-transform: uppercase;">{{ $settings->site_field_one }}</h6>
                                <p class="widget-content">{!! $settings->site_field_one_value !!}</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title" style="text-transform: uppercase;">{{ $settings->site_field_two }}</h6>
                                <p class="widget-content">{!! $settings->site_field_two_value !!}</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title" style="text-transform: uppercase;">{{ $settings->site_field_three }}</h6>
                                <p class="widget-content">{!! $settings->site_field_three_value !!}</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title" style="text-transform: uppercase;">{{ $settings->site_field_four }}</h6>
                                <p class="widget-content">{!! $settings->site_field_four_value !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-text">
                @if($settings->site_creator_link)
                    <p class="mb-md-0">©  {{ $settings->site_copyright }} <a href="{{ $settings->site_creator_link }}" target="_blank" rel="noopener noreferrer" class="text-reset">{{ $settings->site_creator_name }}</a>.</p>
                @endif
                    <p class="mb-0">All right reserved.</p>
            </div>
        </div>
    </footer>

</div>
