<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Debugbar;
use Exception;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($companyId)
    {
        return view('department.create', ['companyId' => $companyId]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$companyId)
    {
        try {
            

            // Validate the incoming request data
           
            // Lấy dữ liệu từ request chỉ bao gồm các trường 'code', 'name' và 'parent_id'
            $data = $request->only(['code', 'name', 'parent_id']);
    
            // Thêm trường 'company_id' vào dữ liệu với giá trị được truyền từ route
            $data['company_id'] = $companyId;
    
            // Tạo mới một Department từ dữ liệu và lưu vào cơ sở dữ liệu
            Department::create($data);
           
    
            // Redirect the user to a specific route
            return redirect()->route('departments.create')->with('success', 'Department created successfully!');
        } catch (Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the department.']);
        }
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
        $department = Department::findOrFail($id);
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department = Department::findOrFail($id);
        $department->code = $request->code;
        $department->name = $request->name;
        $department->save();
       return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(string $id, $idCompany)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('companies.edit',$idCompany);

    }
}
