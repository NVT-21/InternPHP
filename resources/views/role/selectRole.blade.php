<form method="POST" action="{{ route('roles.assignRoles', $userId) }}" >
    @csrf
    <div class="form-group">
        <label for="roles">Choose Roles:</label>
        <select name="roles[]" id="roles" multiple class="form-control">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Assign Roles</button>
</form>
