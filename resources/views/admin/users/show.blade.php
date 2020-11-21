@extends('layouts.admin')

@section('content')
    <h2>{{ $user->name }}</h2>

    <img src="{{ $user->profile->image ? $user->profile->image : '/uploads/users/images/default.png' }}" class="my-2" style="height: 11em;" alt="{{ $user->username ? $user->username : $user->name }} image">

    <div class="sidebar-heading">
        User informations
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username ? $user->username : 'User does not have username' }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->toFormattedDateString() }}</td>
        </tr>
        </tbody>
    </table>

    <hr class="divider">

    <div class="sidebar-heading">
        Profile informations
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Address</th>
            <th>Primary phone</th>
            <th>Secondary phone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $user->profile->address }}</td>
            <td>{{ $user->profile->primary_phone }}</td>
            <td>{{ $user->profile->secondary_phone }}</td>
        </tr>
        </tbody>
    </table>

    <hr class="divider">

    <div class="sidebar-heading">
        Biography and social

    </div>

    <p class="my-3"><strong>{{ $user->name }}'s biography: </strong>{{ $user->profile->bio }}</p>

    <div class="social">
        <a href="{{ $user->profile->facebook }}" target="_blank">Facebook</a>
        <a href="{{ $user->profile->instagram }}"  target="_blank">Instagram</a>
        <a href="{{ $user->profile->linkedin }}"  target="_blank">LinkedIn</a>
        <a href="{{ $user->profile->github }}"  target="_blank">GitHub</a>
        <a href="{{ $user->profile->youtube }}"  target="_blank">YouTube</a>
    </div>
@endsection
