<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Person;
use Illuminate\Http\Request;
use Debugbar;
class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'address' => 'required',
        ]);

        Company::create($request->all());

        return redirect()->route('companies.index')
                         ->with('success', 'Company created successfully.');
    }
    public function addPeople($idCompany, Request $request)
{
    // Lấy id của người dùng từ yêu cầu
    $personId = $request->input('personId');
   
    $company = Company::find($idCompany);

    // Tìm người
    $person = Person::find($personId);
    Debugbar::info($company,$person);
    // Kiểm tra xem có tồn tại cả công ty và người không
    if ($company && $person) {
        // Cập nhật trường idCompany trong bảng people
        $company->people()->save($person);

        // Debug thông tin công ty
        

        return response()->json($company);
    } else {
        // Trả về thông báo lỗi nếu không tìm thấy công ty hoặc người
        return response()->json(['error' => 'Company or person not found.',$company,$person], 404);
    }
}

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'address' => 'required',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('companies.index')
                         ->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')
                         ->with('success', 'Company deleted successfully.');
    }
}

