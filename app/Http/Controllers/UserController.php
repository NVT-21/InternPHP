<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User1;

class UserController extends Controller
{
    public function index()
    {
        $users = User1::find()->person;
        return view('users.indexUser', compact('users'));
    }

    public function create()
    {
        return view('users.createUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'is_active' => 'required|boolean',
        ]);
        
        $data = $request->only('email', 'password', 'is_active');
        $user = User1::create($data);

        return redirect()->route('users.index');
    }
}
