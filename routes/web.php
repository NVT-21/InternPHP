<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
//crud country
Route::get('/getAll',[CountryController::class, 'index'] )->name('country.index');
Route::get('/createCountry',[CountryController::class, 'create'] );
Route::post('/createCountry', [CountryController::class, 'store'])->name('country.store');
Route::get('/editCountry/{id}',[CountryController::class, 'edit'] )->name('country.edit');;
Route::put('editCountry/{id}', [CountryController::class, 'update'])->name('country.update');
Route::delete('deleteCountry/{id}', [CountryController::class, 'destroy'])->name('country.destroy'); 
//end
//crud user 
Route::get('/user/getAll',[UserController::class, 'index'] )->name('users.index');
Route::get('/user/createUser',[UserController::class, 'create'] )->name('users.create');
Route::post('/user/createUser', [UserController::class, 'store'])->name('users.store');
//end
//crud people
Route::get('/person/getAll/{idCompany}',[PersonController::class, 'index'] )->name('persons.index');
Route::get('/person/createPerson',[PersonController::class, 'create'] )->name('persons.create');
Route::get('/person/edit/{id}', [PersonController::class, 'edit'])->name('persons.edit');
Route::put('/person/edit/{id}', [PersonController::class, 'update'])->name('persons.update');
Route::delete('/person/destroy/{id}', [PersonController::class, 'destroy'])->name('persons.destroy');
Route::post('/person/createPerson', [PersonController::class, 'store'])->name('persons.store');
//end 

//crud company
Route::resource('companies', CompanyController::class);
Route::post('/companies/addPeople/{idCompany}', [CompanyController::class, 'addPeople'])->name('companies.addPeople');
Route::get('/companies/edit/{idCompany}', [CompanyController::class, 'edit'])->name('companies.edit');
Route::get('/companies/getPeople/{idCompany}', [CompanyController::class, 'getPeople'])->name('companies.getPeople');

//Crud role
Route::resource('roles', RoleController::class);
Route::get('/roles/assignRoles/{userId}', [RoleController::class, 'viewAssign'])->name('roles.viewRoles');
Route::post('/roles/assignRoles/{userId}', [RoleController::class, 'assignRoles'])->name('roles.assignRoles');

//end
//department
Route::get('/departments/create/{companyId}', [DepartmentController::class, 'create'])->name('departments.create');
Route::get('/departments/edit/{departmentId}', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::post('/departments/store/{companyId}', [DepartmentController::class, 'store'])->name('departments.store');
Route::put('/departments/edit/{id}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('/departments/destroy/{id}/{idCompany}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
//end 
//project
Route::get('/project/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/project/create', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/project/index', [ProjectController::class, 'index'])->name('projects.index');
//end 
//tasks
Route::get('/tasks/index', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/create', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/filter', [TaskController::class, 'filter'])->name('tasks.filter');


Route::get('/', function () {
    return view('welcome');
});
