@extends('layouts.home')

@section('content')
    <div class="container">
        <h1>User Management</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                        <td>{{ $user->is_blocked ? 'Blocked' : 'Active' }}</td>
                        <td>
                            @if (!$user->is_blocked)
                                <form action="{{ route('admin.users.block', $user->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit">Block</button>
                                </form>
                            @else
                                <form action="{{ route('admin.users.unblock', $user->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success btn-sm" type="submit">Unblock</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
@endsection
