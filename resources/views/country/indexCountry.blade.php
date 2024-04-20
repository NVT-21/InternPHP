<!-- resources/views/countries/show.blade.php -->
@foreach ($countries as $country)
<h1>Country Information</h1>

<div>

    <p><strong>Code:</strong> {{ $country->code}}</p>
    <p><strong>Name:</strong> {{ $country->name }}</p>
    <p><strong>Description:</strong> {{ $country->description }}</p>
</div>

<!-- Nút chỉnh sửa -->
<a href="{{ route('country.edit', ['id' => $country->id]) }}">Edit</a>

<!-- Form xóa -->
<form action="{{ route('country.destroy', ['id' => $country->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@endforeach

