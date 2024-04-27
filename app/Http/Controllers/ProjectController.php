<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Person;
use App\Models\Project;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(1);
        
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $companies=Company::all();
        return view('projects.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = Project::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'company_id' => $request->input('company_id'),
        ]);
    
        // Lưu thông tin về những người tham gia dự án
        $people = $request->input('people');
        if ($people) {
            foreach ($people as $personId) {
                // Kiểm tra xem id của người tham gia có tồn tại trong cơ sở dữ liệu không
                $person = Person::find($personId);
                if ($person) {
                    // Tạo liên kết giữa dự án và người tham gia
                    $project->people()->attach($personId);
                }
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Project created successfully.',
            'project' => $project,
        ]);
        // Điều hướng sau khi lưu thành công (ví dụ: chuyển hướng về trang danh sách dự án)
        // return redirect()->route('projects.index')->with('success', 'Project created successfully.');
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
}
