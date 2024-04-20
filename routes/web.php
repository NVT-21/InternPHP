<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CompanyController;
Route::get('/getAll',[CountryController::class, 'index'] )->name('country.index');
Route::get('/createCountry',[CountryController::class, 'create'] );
Route::post('/createCountry', [CountryController::class, 'store'])->name('country.store');
Route::get('/editCountry/{id}',[CountryController::class, 'edit'] )->name('country.edit');;
Route::put('editCountry/{id}', [CountryController::class, 'update'])->name('country.update');
Route::delete('deleteCountry/{id}', [CountryController::class, 'destroy'])->name('country.destroy');  
Route::get('/user/getAll',[UserController::class, 'index'] )->name('users.index');
Route::get('/user/createUser',[UserController::class, 'create'] )->name('users.create');
Route::post('/user/createUser', [UserController::class, 'store'])->name('users.store');
Route::get('/person/getAll/{idCompany}',[PersonController::class, 'index'] )->name('persons.index');
Route::get('/person/createPerson',[PersonController::class, 'create'] )->name('persons.create');
Route::get('/person/edit/{id}', [PersonController::class, 'edit'])->name('persons.edit');
Route::put('/person/edit/{id}', [PersonController::class, 'update'])->name('persons.update');
Route::delete('/person/destroy/{id}', [PersonController::class, 'destroy'])->name('persons.destroy');


Route::resource('companies', CompanyController::class);
Route::post('/companies/addPeople/{idCompany}', [CompanyController::class, 'addPeople'])->name('companies.addPeople');
Route::post('/person/createPerson', [PersonController::class, 'store'])->name('persons.store');
Route::get('/', function () {
    return view('welcome');
});
