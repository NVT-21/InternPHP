<!-- resources/views/users/index.blade.php -->

<h1>User List</h1>

<a href="{{ route('users.create') }}">Create New User</a>

@if (!isset($users) || $users->isEmpty())
    <p>No users found.</p>
@else   
    <ul>
        @foreach($users as $user)
            <li>
                {{ $user->email }}
                ({{ $user->is_active ? 'Active' : 'Inactive' }})
               
            </li>
        @endforeach
    </ul>
@endif
