@extends('layouts.admin')

@section('content')

    <h2>All users</h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>View</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><img style="width: 100px; height: 80px;" src="{{ $user->profile->image ? $user->profile->image : '/uploads/users/images/default.png'}}" alt="{{ $user->username ? $user->username : $user->name }} image"></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('user.show', $user->id) }}" class="btn btn-secondary btn-sm"><span class="fas fa-eye"></span></a></td>
                <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger" name="btn_delete_user" type="submit"><span class="fas fa-trash"></span></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
