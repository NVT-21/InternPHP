<!-- resources/views/persons/index.blade.php -->

    <div class="container">
        <h2>Person List</h2>
        <a href="{{ route('persons.create') }}" class="btn btn-primary">Create Person</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($persons as $person)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $person->full_name }}</td>
                    <td>{{ $person->gender }}</td>
                    <td>{{ $person->birthdate }}</td>
                    <td>{{ $person->phone_number }}</td>
                    <td>{{ $person->address }}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

