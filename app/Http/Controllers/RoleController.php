<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Debugbar;
use App\Models\User1;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
    Debugbar::info($roles);
    return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.createRole');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['role', 'description']);

        // Lưu dữ liệu vào cơ sở dữ liệu
        Role::create($data);
    
        // Chuyển hướng về trang danh sách các role với thông báo thành công
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function viewAssign($userId) {
        $roles = Role::all();
        return view('role.selectRole', compact('roles', 'userId'));
    }
    public function assignRoles($userId,Request $request){
        $selectedRoles = $request->input('roles');
        // return response()->json($id);
        $user = User1::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->roles()->sync($selectedRoles);
        $user->save();
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        
       
       

    }
}
