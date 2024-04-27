<!-- resources/views/projects/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
    <link href="{{ asset('css/project.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Project</div>
                    <div class="card-body">
                        <form action="{{ route('projects.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="Enter project code">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter project name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Enter project description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select name="company_id" id="company_id" class="form-control">
                                    <option></option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="people">People</label>
                                <select name="people[]" id="people" class="form-control" multiple>
                                    <!-- Populate this dropdown with people -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
     $(document).ready(function() {
        $('#company_id').change(function() {
            var companyId = $(this).val(); // Lấy giá trị của công ty được chọn
            if (companyId) {
                // Nếu có giá trị công ty được chọn, gửi yêu cầu AJAX để lấy danh sách người
                $.ajax({
                    url: 'http://localhost:8000/companies/getPeople/' + companyId, // Địa chỉ URL để lấy danh sách người (cần phải thay đổi theo đường dẫn của ứng dụng của bạn)
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Xóa tất cả các option hiện có trong dropdown người
                        $('#people').empty();
                        // Thêm các option mới cho dropdown người từ danh sách những người thuộc công ty
                        console.log(data);
                        data.forEach(person => {
        $('#people').append('<option value="' + person.id + '">' + person.full_name + '</option>');
    });
                        
                    }
                });
            } else {
                // Nếu không có giá trị công ty được chọn, xóa tất cả các option trong dropdown người
                $('#people').empty();
            }
        });
    });
</script>
</html>
