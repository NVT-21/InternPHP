<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        return $this->companyRepository->all();
    }

    public function create($data)
    {
        return $this->companyRepository->create($data);
    }

    public function find($id)
    {
        return $this->companyRepository->find($id);
    }

    public function update($company, $data)
    {
        return $this->companyRepository->update($company, $data);
    }

    public function delete($company)
    {
        $this->companyRepository->delete($company);
    }

    public function getPeople($company)
    {
        return $this->companyRepository->getPeople($company);
    }
}
