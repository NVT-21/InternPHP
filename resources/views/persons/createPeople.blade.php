<form action="{{ route('persons.store') }}" method="post">
    @csrf

    <!-- User Information -->
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="is_active">Is Active:</label>
        <input type="checkbox" id="is_active" name="is_active" value="1">
    </div>

    <!-- Person Information -->
    <div>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name">
    </div>
    <div>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender">
    </div>
    <div>
        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate">
    </div>
    <div>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number">
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
    </div>

    <button type="submit">Submit</button>
</form>
