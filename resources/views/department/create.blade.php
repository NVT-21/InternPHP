<div class="container">
    
                <div class="card-header">Create Department</div>

                <div class="card-body">
                    <form  action="{{ route('departments.store', $companyId) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" name="code" class="form-control" id="code" placeholder="Enter department code" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter department name" required>
                        </div>

                        <!-- Thêm các trường dữ liệu khác nếu cần -->

                        <button type="submit" class="btn btn-primary">Create Department</button>
                    </form>
        
</div>

