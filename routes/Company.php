<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CompanyController;

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
