<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'auth.login');


Route::get('/', [AuthController::class,'loginPage'])->name('login');
Route::post('login', [AuthController::class,'loginInUser'])->name('login.user');
Route::get('logout', [AuthController::class,'logOutUser'])->name('logout');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::controller(DashboardController::class)->group(function (){
        Route::get('dashboard','index')->name('dashboard');
    });

    Route::controller(\App\Http\Controllers\UserController::class)->group(function (){
        Route::get('/users', 'index')->name('users.index');
        Route::post('/user-create', 'createNewUser')->name('user.store');
        Route::get('/user-delete/{user_id}', 'deleteUser')->name('user.delete');
        Route::get('/user-edit/{user_id}', 'editUser')->name('user.edit');
        Route::post('/user-update', 'updateUserInfo')->name('user.update');
        Route::get('/status-change/{user_id}/{status}', 'changeUserStatus')->name('user.status.change');
        Route::get('/user-profile-settings/{user_id}', 'showUserSettings')->name('user.settings');
    });

    Route::controller(\App\Http\Controllers\RolePermissionController::class)->group(function (){
        Route::get('/roles', 'index')->name('roles.index');
        Route::post('/role-create', 'createNewRole')->name('role.store');
        Route::get('/role-delete/{role_id}', 'deleteRole')->name('role.delete');
        Route::get('/role-edit/{role_id}', 'getRolePermissions')->name('role.edit');
        Route::post('/role-update', 'updateRoleInfo')->name('role.update');
    });
});

