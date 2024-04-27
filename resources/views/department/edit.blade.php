<div class="container">
    
                <div class="card-header">Edit Department</div>

                <div class="card-body">
                    <form  action="{{ route('departments.update', $department->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                       
            
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" name="code" class="form-control" id="code" value=" {{ $department->code }}"  required>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $department->name }}"required>
                        </div>

                        <!-- Thêm các trường dữ liệu khác nếu cần -->

                        <button type="submit" class="btn btn-primary">Create Department</button>
                    </form>
        
</div>