<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\User1;
use Debugbar;
class PersonController extends Controller
{
    public function index()
{
    $users = Person::with('user')->get();
    Debugbar::info($users);
    return view('persons.infoPeople', compact('users'));
}
public function create()
{
    return view('persons.createPeople');
}
public function store(Request $request)
{
    $person = Person::create([
        'full_name' => $request->full_name,
        'gender' => $request->gender,
        'birthdate' => $request->birthdate,
        'phone_number' => $request->phone_number,
        'address' => $request->address,
    ]);

    // Tạo User và gán person_id
    $user = new User1([
        'email' => $request->email,
        'password' => bcrypt($request->password), // Hãy sử dụng bcrypt để mã hóa mật khẩu
        'is_active' => $request->is_active,
    ]);
    $person->user()->save($user);

    return redirect()->route('persons.index')
                    ->with('success', 'Person created successfully.');
}
public function edit($id)
{
    $person = Person::with('user')->findOrFail($id);
    Debugbar::info($person);
    return view('persons.edit', compact('person'));
}
public function update(Request $request, $id)
{
    $person = Person::with('user')->findOrFail($id);
    Debugbar::info($person);
    $person->update([
        'full_name' => $request->full_name,
        'gender' => $request->gender,
        'birthdate' => $request->birthdate,
        'phone_number' => $request->phone_number,
        'address' => $request->address,
    ]);

    $user = $person->user;
    $is_active = $request->has('is_active'); // Kiểm tra xem checkbox có được chọn hay không

$user->update([
    'email' => $request->email,
    'is_active' => $is_active, // Gán giá trị true hoặc false tùy thuộc vào checkbox được chọn hay không
]);

    return redirect()->route('persons.index')
                    ->with('success', 'Person updated successfully.');
}

public function destroy($id)
{
    $person = Person::findOrFail($id);
    $person->delete();

    return redirect()->route('persons.index')
                    ->with('success', 'Person deleted successfully.');
}
}
