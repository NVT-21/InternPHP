<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Services\CountryService;
use App\Http\Requests\CountryRequest;
class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $countries = $this->countryService->getAllCountries();
       
            return view('country.indexCountry',compact('countries')); 
       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('country.createCountry');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {  
        $data = $request->only(['code', 'name', 'description']);
        $country = $this->countryService->createCountry($data);
       
        
        return redirect(route('country.index'));
    
    }
    public function edit($id)
{
    $currCountry = $this->countryService->getCountryById($id);
    return view('country.editCountry', compact('currCountry'));
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   $data = $request->only(['code', 'name', 'description']);
        $currCountry = $this->countryService->updateCountry($id,$data);
        dump($currCountry);
        return redirect(route('country.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteCountry = $this->countryService->deleteCountry($id);
        return redirect(route('country.index'));
    }
}
