@extends('layouts.admin')

@section('content')
    <h1 class="d-sm-flex align-items-center justify-content-between mb-4">Add new user</h1>

    @include('includes._errors')
    @include('includes._sessions')

    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="custom-file mb-4">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-outline-success" name="btn_create_user">Create user</button>
        </div>
    </form>

    @include('includes._errors')

@endsection
