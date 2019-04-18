<?php


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

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'namespace'  => 'Auth',
    'prefix'     => 'auth',
], function() {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user', 'AuthController@user');
    Route::post('register', 'RegisterController@register');
});

Route::group(['middleware' => ['auth:api', 'json']], function() {
    Route::get('me', 'UserController@me');

    //Leaves Form
    Route::get('users/leaves', 'UserLeaveController@index');
    Route::get('users/leaves/{id}', 'UserLeaveController@show');
    Route::post('users/leaves', 'UserLeaveController@store');
    Route::put('users/leaves/{id}', 'UserLeaveController@update');
    Route::get('users/leaves-title', 'UserLeaveController@getTitles');

    //Leaves Type
    Route::get('users/leave-type', 'UserLeaveTypeController@index');
    Route::get('users/leave-type/{id}', 'UserLeaveTypeController@show');
    Route::post('users/leave-type', 'UserLeaveTypeController@store');
    Route::put('users/leave-type/{id}', 'UserLeaveTypeController@update');
    Route::delete('users/leave-type/{id}', 'UserLeaveTypeController@destroy');
    Route::get('users/leave-type-title', 'UserLeaveTypeController@getTitles');

    //Users Role
    Route::get('users/roles', 'UserRoleController@index');
    Route::post('users/roles', 'UserRoleController@store');
    Route::delete('users/roles/{id}', 'UserRoleController@destroy');
    Route::get('users/roles-title', 'UserRoleController@getTitles');

    //Employees
    Route::get('users/employees', 'EmployeeController@index');
    Route::get('users/employees/{id}', 'EmployeeController@show');
    Route::post('users/employees', 'EmployeeController@store');
    Route::put('users/employees/{id}', 'EmployeeController@update');
    Route::delete('users/employees/{id}', 'EmployeeController@destroy');
    Route::get('users/employees-title', 'EmployeeController@getTitles');

    //Attendance
    Route::get('users/attendance', 'AttendanceController@index');
    Route::get('users/attendance/{id}', 'AttendanceController@show');
    Route::post('users/attendance', 'AttendanceController@store');
    Route::put('users/attendance/{id}', 'AttendanceController@update');
    Route::delete('users/attendance/{id}', 'AttendanceController@destroy');
    Route::get('users/attendance-title', 'AttendanceController@getTitles');

    //Users
    Route::get('users/', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users/{id}', 'UserController@store');
    Route::put('users/{id}', 'UserController@update');
    Route::get('users-title/', 'UserController@getTitles');
});
