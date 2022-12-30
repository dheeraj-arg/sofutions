<?php

use App\Http\Controllers\AdminCompanyController;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// API to list of companies publicly.
Route::get('/companies', function(){
    return Company::all();
});
# http://localhost/hazesoft/public/api/companies

//API to list department of company.
Route::get('/companyDepartments/{id}',[AdminCompanyController::class, 'showDepartment'])->where('id', '[0-9]+');
# http://localhost/hazesoft/public/api/companyDepartments/1

//API to list employees in a company publicly
Route::get('/companyEmployee/{id}',[AdminCompanyController::class, 'showEmployee'])->where('id', '[0-9]+');
# http://localhost/hazesoft/public/api/companyEmployee/1

// API to list employees in a specific department of a company
Route::get('/companyEmployeeDep/{id}',[AdminCompanyController::class, 'showEmployeeAsPerDepartment'])->where('id', '[0-9]+');
# http://localhost/hazesoft/public/api/companyEmployeeDep/1

// API to view employee details with respective company and departments
Route::get('/EmployeeDetails',[AdminCompanyController::class, 'showEmployeeDetails']);
# http://localhost/hazesoft/public/api/EmployeeDetails?com_id=1&dep_id=1

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
