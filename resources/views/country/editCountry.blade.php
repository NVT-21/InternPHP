<!-- resources/views/countries/create.blade.php -->

<form  action="{{ route('country.update', ['id' => $currCountry->id]) }}" method="POST">
    @csrf
    @method("PUT")
    <div>
        <label for="code">Code:</label>
        <input type="text" id="code" name="code" value="{{ $currCountry->code ?? old('code') }}">
    </div>
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $currCountry->name ?? old('name') }}">
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $currCountry->description ?? old('description') }}</textarea>
    </div>
    <button type="submit">edit</button>
</form>