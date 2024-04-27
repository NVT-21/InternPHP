<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Project;
use App\Models\Company;
use App\Models\Task;
class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(2); // Phân trang với mỗi trang hiển thị 10 bản ghi
       
        $projects=Project::all();
        $people=Person::all();
        return view('tasks.index', compact('tasks', 'projects', 'people'));
    }
    public function filter(Request $request)
{
    $query = Task::query();
     
        $projects=Project::all();
        $people=Person::all();

    // Lọc theo Company
   

    // Lọc theo Project
    if ($request->has('project') && $request->input('project') !== null) {
        $query->where('project_id', $request->input('project'));
    }
    
    // Lọc theo Person
    if ($request->has('person') && $request->input('person') !== null) {
        $query->where('person_id', $request->input('person'));
    }
    
    // Lọc theo Status
    if ($request->has('status') && $request->input('status') !== null) {
        $query->where('status', $request->input('status'));
    }
    
    // Lọc theo Priority
    if ($request->has('priority') && $request->input('priority') !== null) {
        $query->where('priority', $request->input('priority'));
    }
    if ($request->has('name') && $request->input('name') !== null) {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }

    // Lấy ra danh sách Task đã lọc
    $tasks = $query->paginate(2); // Số lượng bản ghi hiển thị trên mỗi trang là 10

    return view('tasks.index', compact('tasks', 'projects', 'people'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $projects=Project::all();
        $people=Person::all();
        return view('tasks.create',compact('people','projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $data = $request->all();
    
        // Tạo mới task và lưu vào cơ sở dữ liệu
        $newTask = Task::create($data);
    
        // Trả về task mới tạo dưới dạng JSON
        return response()->json(['task' => $newTask], 201);

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
