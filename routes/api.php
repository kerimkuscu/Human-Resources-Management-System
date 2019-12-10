<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLeaveController;
use App\Http\Controllers\UserLeaveTypeController;
use App\Http\Controllers\UserRoleController;

Route::group([
    'middleware' => 'api',
    'namespace' => 'Auth',
    'prefix' => 'auth',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'user']);
    Route::post('register', [RegisterController::class, 'register']);
});

Route::group(['middleware' => ['auth:api', 'json']], function () {
    Route::get('me', [UserController::class, 'me']);

    //Leaves Form
    Route::get('users/leaves', [UserLeaveController::class, 'index']);
    Route::get('users/leaves/{id}', [UserLeaveController::class, 'show']);
    Route::post('users/leaves', [UserLeaveController::class, 'store']);
    Route::put('users/leaves/{id}', [UserLeaveController::class, 'update']);

    //Leaves Type
    Route::get('users/leave-type', [UserLeaveTypeController::class, 'index']);
    Route::get('users/leave-type/{id}', [UserLeaveTypeController::class, 'show']);
    Route::post('users/leave-type', [UserLeaveTypeController::class, 'store']);
    Route::put('users/leave-type/{id}', [UserLeaveTypeController::class, 'update']);
    Route::delete('users/leave-type/{id}', [UserLeaveTypeController::class, 'destroy']);

    //Users Role
    Route::get('users/roles', [UserRoleController::class, 'index']);
    Route::post('users/roles', [UserRoleController::class, 'store']);
    Route::delete('users/roles/{id}', [UserRoleController::class, 'destroy']);

    //Employees
    Route::get('users/employees', [EmployeeController::class, 'index']);
    Route::get('users/employees/{id}', [EmployeeController::class, 'show']);
    Route::post('users/employees', [EmployeeController::class, 'store']);
    Route::put('users/employees/{id}', [EmployeeController::class, 'update']);
    Route::delete('users/employees/{id}', [EmployeeController::class, 'destroy']);

    //Attendance
    Route::get('users/attendance', [AttendanceController::class, 'index']);
    Route::get('users/attendance/{id}', [AttendanceController::class, 'show']);
    Route::post('users/attendance', [AttendanceController::class, 'store']);
    Route::put('users/attendance/{id}', [AttendanceController::class, 'update']);
    Route::delete('users/attendance/{id}', [AttendanceController::class, 'destroy']);

    //Candidates
    Route::get('users/candidates', [CandidatesController::class, 'index']);
    Route::get('users/candidates/{id}', [CandidatesController::class, 'show']);
    Route::post('users/candidates', [CandidatesController::class, 'store']);
    Route::put('users/candidates/{id}', [CandidatesController::class, 'update']);
    Route::delete('users/candidates/{id}', [CandidatesController::class, 'destroy']);

    //Users
    Route::get('users/', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::post('users/{id}', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
});
