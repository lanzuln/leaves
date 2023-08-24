<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\tokenVarificationMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ManagerController::class)->group(function () {

    // api route
    Route::post('/manager-registration', 'managerRegistration');
    Route::post('/login', 'Login');
    // page route
    Route::get('/login', 'LoginPage')->name('login');
    Route::get('/manager_logout', 'managerLogout')->name('manager_logout');
    Route::get('/manager-registration', 'managerRegistrationPage')->name('manager-registration');

    Route::get('/total-appication-manager', 'managerAppicationTotal')->Middleware([tokenVarificationMiddleware::class]);
    Route::get('/pending-appication-manager', 'managerAppicationpending')->Middleware([tokenVarificationMiddleware::class]);
    Route::get('/manager_employe_list', 'employeeLeavesList')->Middleware([tokenVarificationMiddleware::class]);
    Route::post('/manager_employe_list_id', 'employeeLeavesListById')->Middleware([tokenVarificationMiddleware::class]);
});

Route::controller(EmployeeController::class)->group(function () {
    // api route
    Route::post('/employee-registration', 'employeeRegistration');
    Route::post('/employee-login', 'employeeLogin');
    Route::get('/total-employee', 'totalEmployee');

    // page route
    Route::get('/employee_logout', 'employeeLogout')->name('employee_logout');
    Route::get('/employee-registration', 'employeeRegistrationPage')->name('employee-registration');

});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/manager-dashboard', 'manager_dashboard')->Middleware([tokenVarificationMiddleware::class]);
    Route::get('/employee-dashboard', 'employee_dashboard')->Middleware([tokenVarificationMiddleware::class]);
});

Route::controller(LeaveController::class)->group(function () {
    Route::get('/list-leaves', 'listLeaves')->Middleware([tokenVarificationMiddleware::class]);
    Route::post('/create-leaves', 'createLeaves')->Middleware([tokenVarificationMiddleware::class]);

    Route::get('/total-appication', 'TotalAppication')->Middleware([tokenVarificationMiddleware::class]);
    Route::get('/pending-appication', 'pendingAppication')->Middleware([tokenVarificationMiddleware::class]);


});
