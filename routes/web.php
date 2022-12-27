<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryOfficeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IogtController;
use App\Http\Controllers\NewRapidFlowController;
use App\Http\Controllers\NewThemeficController;
use App\Http\Controllers\RapidProController;
use App\Http\Controllers\RapidProFlowController;
use App\Http\Controllers\ThemeficAreaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('check', function(){
//     return \App\Models\User::all();
// });
Route::view('/login', 'auth.login');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:cache');
    return '<h1>Cache facade value cleared</h1>';
});


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


    Route::controller(RapidProController::class)->group(function(){

       // Route::get('rapidpro','createRapidPro')->name('rapid.pro.create');
        Route::get('rapidpro/flow','rapidFlow')->name('rapid.pro.flow');
        Route::post('rapidpro/flow/store','storeTRapidFlow')->name('store.rapid.pro.flow');
        Route::get('rapidpro/json/{id}','rapidProJson')->name('store.rapid.pro.json');

    });

    Route::controller(IogtController::class)->group(function(){

        Route::get('iogt','index')->name('iogt.index');
       // Route::get('rapidpro/flow','rapidFlow')->name('rapid.pro.flow');

    });

    Route::controller(CountryOfficeController::class)->group(function(){

        Route::get('country/office','index')->name('get.country.office');
        Route::post('country-office/store','store')->name('country.office.store');
        Route::get('country-office/edit/{id}','edit')->name('country.office.edit');
        Route::post('country-office/update/{id}','update')->name('country-office.update');
        Route::get('country-office/delete/{id}','delete')->name('country.office.delete');

    });

    Route::controller(ThemeficAreaController::class)->group(function(){

        Route::get('themefic-area','view')->name('themefic-area.view');
        Route::get('themefic-area/{area}','getAreaById')->name('themefic-area.getAreaById');
        Route::post('themefic-area','store')->name('themefic-area.store');
        Route::patch('themefic-area/update/{area}','update')->name('themefic-area.update');
        Route::delete('themefic-area/areaDeleteById','areaDeleteById')->name('themefic-area.areaDeleteById');

    });

    Route::controller(RapidProFlowController::class)->group(function(){

        Route::get('rapidpro-flow','createRapidPro')->name('rapid.pro.create');
        Route::post('rapidpro-flow/store','storeFlow')->name('rapid.flow.store');

    });

    Route::controller(NewRapidFlowController::class)->group(function(){


        Route::get('rapid-pro/flow','view')->name('rapid.flow.view');
        Route::get('rapid/pro/flow/{flow}','getRapidFlowId')->name('rapid.flow.getRapidFlowId');
        Route::post('rapidpro/flow','store')->name('rapid.flow.store');
        Route::patch('rapidpro/flow/update/{flow}','update')->name('rapid.flow.update');
        Route::delete('rapidpro/flow/flowDeleteById','flowDeleteById')->name('rapid.flow.flowDeleteById');

        Route::get('rapid-pro/view/{flow}','viewFlow')->name('rapid.view-flow');    
        Route::post('rapid-pro/question','storeQuestion')->name('rapidpro.question.store');
        Route::get('rapidpro/json/{id}','exportJson')->name('rapidpro.question.json');


    });


   






});

