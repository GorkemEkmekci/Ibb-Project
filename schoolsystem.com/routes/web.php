<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'AuthLogin']);
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout']);



Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });

});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', function () {
        return view('admin.dashboard');
    });

});

