<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục phòng ban</title>

    <link href="/css/style.css" rel="stylesheet">

</head>
<body>
    <div class="container">
    <h1>thông tin công ty</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}">
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $company->code}}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $company->address }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
        <h1>Danh mục phòng ban</h1>

        <div class="actions">
        <a href="{{ route('departments.create',['companyId' => $company->id]) }}" class="btn btn-primary">Thêm mới</a>

            <button class="btn-import">Nhập Excel</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên phòng ban</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($departments as $department)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $department->name }}</td>
            <td>{{ $department->code }}</td>
            <td>
            <a href="{{ route('departments.edit', $department->id) }}" class="btn-edit">Sửa</a>

            <form action="{{ route('departments.destroy', ['id' => $department->id, 'idCompany' => $company->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Xóa</button>
        </form>
               
            </td>
        </tr>
    @endforeach
                
            </tbody>
        </table>
    </div>

    <script src="script.js"></script>
</body>
</html>
