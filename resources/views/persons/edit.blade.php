<h1>Edit User</h1>

<form action="{{ route('persons.update', $person->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="{{ $person->user->email }}">
    </div>
    <div>
        <label for="is_active">Is Active:</label>
        <input type="checkbox" id="is_active" name="is_active" {{ $person->user->is_active ? 'checked' : '' }}>
    </div>
    <div>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="{{ $person->full_name }}">
    </div>
    <div>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="{{ $person->gender }}">
    </div>
    <div>
        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" value="{{ $person->birthdate }}">
    </div>
    <div>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ $person->phone_number }}">
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ $person->address }}">
    </div>

    <button type="submit">Save</button>
</form>
