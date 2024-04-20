<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries()
    {
        return $this->countryRepository->all();
    }

    public function getCountryById($id)
    {
        return $this->countryRepository->find($id);
    }

    public function createCountry($data)
    {
        return $this->countryRepository->create($data);
    }

    public function updateCountry($id, $data)
    {
         $this->countryRepository->update($id, $data);
    }

    public function deleteCountry($id)
    {
        return $this->countryRepository->delete($id);
    }
}
