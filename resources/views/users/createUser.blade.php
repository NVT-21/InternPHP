<!-- resources/views/users/create.blade.php -->

<h1>Create New User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
    </div>

    <div>
        <label for="is_active">Active:</label>
        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
    </div>

    <button type="submit">Create</button>
</form>
