<!-- resources/views/tasks/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h1>Task List</h1>

    <form action="{{ route('tasks.filter') }}" method="GET">
       
        <div>
            <label for="project">Project:</label>
            <select name="project" id="project">
                <option value="">Select Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="person">Person:</label>
            <select name="person" id="person">
                <option value="">Select Person</option>
                @foreach ($people as $person)
                    <option value="{{ $person->id }}">{{ $person->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="">Select Status</option>
                <option value="1">New</option>
                    <option value="2">In Progress</option>
                    <option value="3">Completed</option>
                    <option value="4">On Hold</option>
            </select>
        </div>
        <div>
            <label for="priority">Priority:</label>
            <select name="priority" id="priority">
                <option value="">Select Priority</option>
                 <option value="1">High</option>
                    <option value="2">Medium</option>
                    <option value="3">Low</option>
            </select>
        </div>
        <div>
        <label for="name">Task Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter task name">
    </div>
        <button type="submit">Search</button>
    </form>


   
    
    <table>
        <!-- Header table -->
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Person ID</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Priority</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data rows -->
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->project_id }}</td>
                    <td>{{ $task->person_id }}</td>
                    <td>{{ $task->start_time }}</td>
                    <td>{{ $task->end_time }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tasks->appends(request()->input())->links() }}
</body>
</html>
