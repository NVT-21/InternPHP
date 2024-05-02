<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function all()
    {
        return Company::all();
    }

    public function create($data)
    {
        return Company::create($data);
    }

    public function find($id)
    {
        return Company::findOrFail($id);
    }

    public function update($company, $data)
    {
        $company->update($data);
        return $company;
    }

    public function delete($company)
    {
        $company->delete();
    }

    public function getPeople($company)
    {
        return $company->people;
    }
}
