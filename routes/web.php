<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::view('admin','admin');

Route::get('/', function () {
    return view('welcome');
});
Route::view('registrasi','registrasi');

Route::get('/employee', function () {
    return view('employee');
});
Route::get('/company', function () {
    return view('company');
});



Route::resource('company', CompanyController::class);
Route::resource('employee', EmployeeController::class);


Route ::post('/company', [CompanyController::class,'store'])->name('company.store');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');



Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


