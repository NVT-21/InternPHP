<h1>All Users</h1>
@foreach ($users as $user)
    <div>
        <h2>Person Information</h2>
        <p>Email: {{ $user->user->email ?? 'N/A' }}</p>
      
        @if ($user->user)
    <p>Is Active: {{ $user->user->is_active ? 'Yes' : 'No' }}</p>
@else
    <p>Is Active: N/A</p>
@endif


        <p>Full Name: {{ $user->full_name }}</p>
        <p>Gender: {{ $user->gender }}</p>
        <p>Birthdate: {{ $user->birthdate }}</p>
        <p>Phone Number: {{ $user->phone_number }}</p>
        <p>Address: {{ $user->address }}</p>

        <!-- Form for edit -->
        <form action="{{ route('persons.edit', ['id' => $user->id]) }}" method="GET" style="display: inline;">
            @csrf
            <button type="submit">Edit</button>
        </form>

        <!-- Form for delete -->
        <form action="{{ route('persons.destroy', ['id' => $user->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <form action="{{ route('companies.addPeople', ['idCompany' => request()->route('idCompany'), 'personId' => $user->id]) }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit">Add to Company</button>
</form>

    </div>
@endforeach



