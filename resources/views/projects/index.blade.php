<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <link href="{{ asset('css/indexP.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Project Details</h1>

    @foreach ($projects as $project)
        <h2>Project Information</h2>
        <ul>
            <li>ID: {{ $project->id }}</li>
            <li>Code: {{ $project->code }}</li>
            <li>Name: {{ $project->name }}</li>
            <li>Description: {{ $project->description }}</li>
            <li>Company: {{ $project->company->name }}</li>
        </ul>

        <h2>People Involved</h2>
        <ul>
            @foreach ($project->people as $person)
                <li>
                    <strong>{{ $person->full_name }}</strong>
                    <ul>
                        <li>ID: {{ $person->id }}</li>
                        <li>Gender: {{ $person->gender }}</li>
                        <li>Birthdate: {{ $person->birthdate }}</li>
                        <li>Phone Number: {{ $person->phone_number }}</li>
                        <li>Address: {{ $person->address }}</li>
                    </ul>
                </li>
            @endforeach
        </ul>
    @endforeach
    {{ $projects->links() }}
</body>
</html>
