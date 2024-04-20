 <!-- <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form> -->



                <td>
                        <a href="{{ route('persons.show', $person->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('persons.edit', $person->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('persons.destroy', $person->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>