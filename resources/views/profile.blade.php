@extends('layouts.home')

@section('content')
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img style="width: 50%;" src="{{ $user->profile->image }}" alt="{{ $user->name }} image " class="pb-4">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{ $user->name }}
                        </h5>
                        <h6>
{{--                            profession--}}
                        </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @if(!empty($user->profile->bio))
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bio</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Learn more</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('user.edit.profile', $user->id) }}" class="btn btn-primary" style="color: white;">Edit profile</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <div>
                            <p>WORK LINK</p>
{{--                            other profiles--}}
                        </div>
                        <div class="py-4">
                            <p>SKILLS</p>
{{--                            skills--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p>
                                {!! $user->profile->bio !!}
                            </p>
                        </div>


                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>

                            @if($user->username)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->username }}</p>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email ? $user->email : 'No email' }}</p>
                                </div>
                            </div>
                            @if($user->profile->primary_phone || $user->profile->secondary_phone)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->phone }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($user->profile->profession)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->profession }}</p>
                                    </div>
                                </div>
                            @endif


{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label>Experience</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <p>Expert</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label>Hourly Rate</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <p>10$/hr</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label>Total Projects</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <p>230</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label>English Level</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <p>Expert</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label>Availability</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <p>6 months</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <label>Your Bio</label><br/>--}}
{{--                                    <p>Your detail description</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
