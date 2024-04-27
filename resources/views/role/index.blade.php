    
    <div class="container">
        <h1>All Roles</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->role }}</td>
                        <td>{{ $role->description }}</td>
                        @endforeach
                        
                          
                         
     
