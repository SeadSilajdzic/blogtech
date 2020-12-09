@extends('layouts.home')

@section('content')

    <div class="container">
        <h2>User profile: <strong>{{ $user->name }}</strong></h2>

        @include('includes._errors')
        @include('includes._sessions')

        <form action="{{ route('user.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="custom-file my-4">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{ $user->username }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <hr class="divider">

            <div class="form-group">
                <label for="bio">About Me</label>
                <textarea class="form-control" name="bio" id="mytinytext" cols="30" rows="10">{{ $user->profile->bio }}</textarea>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $user->profile->address }}">
            </div>

            <div class="form-group">
                <label for="primary_phone">Primary phone number</label>
                <input type="text" name="primary_phone" class="form-control" value="{{ $user->profile->primary_phone }}">
            </div>

            <div class="form-group">
                <label for="secondary_phone">Secondary phone number</label>
                <input type="text" name="secondary_phone" class="form-control" value="{{ $user->profile->secondary_phone }}">
            </div>

            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
            </div>

            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="{{ $user->profile->instagram }}">
            </div>

            <div class="form-group">
                <label for="linkedin">LinkedIn</label>
                <input type="text" name="linkedin" class="form-control" value="{{ $user->profile->linkedin }}">
            </div>

            <div class="form-group">
                <label for="github">GitHub</label>
                <input type="text" name="github" class="form-control" value="{{ $user->profile->github }}">
            </div>
            <div class="form-group">
                <label for="youtube">YouTube</label>
                <input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
            </div>

            <hr class="divider">

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="form-group">
                <div class="alert alert-warning">
                    <p>
                        <strong>Link</strong> <br>
                        <span>Please make sure that your links are complete (with http://, https:// ...)</span>
                    </p>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" name="btn_update_user_profile" class="btn btn-primary btn-block">Update profile</button>
            </div>
        </form>

        @include('includes._errors')
    </div>

@endsection
