<?php

use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\AdminDepartmentController;
use App\Http\Controllers\AdminEmployeeController;
use App\Http\Controllers\AdminSetupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    // Company Route
    Route::get('/company',[AdminCompanyController::class,'index'])->name('company.index');
    Route::get('/company/create',[AdminCompanyController::class,'create'])->name('company.create');
    Route::post('/company/store',[AdminCompanyController::class,'store'])->name('company.store');
    Route::get('/company/delete/{id}',[AdminCompanyController::class,'destroy'])->name('company.destroy')->where('{id}','0-9');
    Route::get('/company/edit/{id}',[AdminCompanyController::class,'edit'])->name('company.edit')->where('{id}','0-9');
    Route::put('/company/update',[AdminCompanyController::class,'update'])->name('company.update');

    // Employee Route
    Route::get('/employee',[AdminEmployeeController::class,'index'])->name('employee.index');
    Route::get('/employee/create',[AdminEmployeeController::class,'create'])->name('employee.create');
    Route::post('/employee/store',[AdminEmployeeController::class,'store'])->name('employee.store');
    Route::get('/employee/delete/{id}',[AdminEmployeeController::class,'destroy'])->name('employee.destroy')->where('{id}','0-9');
    Route::get('/employee/edit/{id}',[AdminEmployeeController::class,'edit'])->name('employee.edit')->where('{id}','0-9');
    Route::put('/employee/update',[AdminEmployeeController::class,'update'])->name('employee.update');

     //Company - Employee - department Route
     Route::get('/setup',[AdminSetupController::class,'index'])->name('setup.index');
     Route::get('/setup/create',[AdminSetupController::class,'create'])->name('setup.create');
     Route::post('/setup/store',[AdminSetupController::class,'store'])->name('setup.store');

});



Route::get('/', function () {
    return view('task');
});

Route::get('/admin/adminPermision', function () {
    if(auth()->user()){
        auth()->user()->assignRole('admin');
    }
    return redirect()->route('company.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
