<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryOfficeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IogtController;
use App\Http\Controllers\NewRapidFlowController;
use App\Http\Controllers\NewRegionController;
use App\Http\Controllers\ProfileManageController;
use App\Http\Controllers\QuestionManageController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ThemeficAreaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('test', function () {
    $code = Http::get('ucms.local/rapid-pro/flow');
    return $code->status();
});
Route::view('/login', 'auth.login');

Route::get('/', [AuthController::class, 'loginPage'])->name('login');
Route::post('login', [AuthController::class, 'loginInUser'])->name('login.user');
Route::get('logout', [AuthController::class, 'logOutUser'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::get('/clear-cache', function () {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('optimize');
        Artisan::call('view:clear');
        Artisan::call('route:cache');
        return '<h1>Cache facade value cleared</h1>';
        // return vie')->with('<h1>Cache facade value cleared</h1>');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::post('/user-create', 'createNewUser')->name('user.store');
        Route::get('/user-delete/{user_id}', 'deleteUser')->name('user.delete');
        Route::get('/user-edit/{user_id}', 'editUser')->name('user.edit');
        Route::post('/user-update', 'updateUserInfo')->name('user.update');
        Route::get('/status-change/{user_id}/{status}', 'changeUserStatus')->name('user.status.change');
        Route::get('/user-profile-settings', 'showUserSettings')->name('user.settings');
    });

    Route::controller(RolePermissionController::class)->group(function () {
        Route::get('/roles', 'index')->name('roles.index');
        Route::post('/role-create', 'createNewRole')->name('role.store');
        Route::get('/role-delete/{role_id}', 'deleteRole')->name('role.delete');
        Route::get('/role-edit/{role_id}', 'getRolePermissions')->name('role.edit');
        Route::post('/role-update', 'editRolePermission')->name('role.update');
    });

    Route::controller(IogtController::class)->group(function () {

        Route::get('iogt', 'index')->name('iogt.index');
        // Route::get('rapidpro/flow','rapidFlow')->name('rapid.pro.flow');

    });

    Route::controller(CountryOfficeController::class)->prefix('country-offices')->group(function () {

        Route::get('/', 'view')->name('offices.view');
        Route::get('/{office}', 'getOffice')->name('offices.getOffice');
        Route::post('/store', 'store')->name('offices.store');
        Route::patch('/update/{office}', 'update')->name('offices.update');
        Route::delete('/officedelete', 'delete')->name('offices.delete');

    });

    Route::controller(ThemeficAreaController::class)->group(function () {

        Route::get('themefic-area', 'view')->name('themefic-area.view');
        Route::get('themefic-area/{area}', 'getAreaById')->name('themefic-area.getAreaById');
        Route::post('themefic-area', 'store')->name('themefic-area.store');
        Route::patch('themefic-area/update/{area}', 'update')->name('themefic-area.update');
        Route::delete('themefic-area/areaDeleteById', 'areaDeleteById')->name('themefic-area.areaDeleteById');

    });

    Route::controller(NewRapidFlowController::class)->group(function () {

        Route::get('rapid-pro/flow', 'view')->name('rapid.flow.view');
        Route::get('rapid/pro/flow/{flow}', 'getRapidFlowId')->name('rapid.flow.getRapidFlowId');
        Route::post('rapidpro/flow', 'store')->name('rapid.flow.store');
        Route::patch('rapidpro/flow/update/{flow}', 'update')->name('rapid.flow.update');
        Route::delete('rapidpro/flow/flowDeleteById', 'flowDeleteById')->name('rapid.flow.flowDeleteById');
        Route::get('rapid-pro/view/{flow}', 'viewFlow')->name('rapid.view-flow');
        Route::post('rapid-pro/question', 'storeQuestion')->name('rapidpro.question.store');
        Route::get('rapidpro/json/{id}', 'exportJson')->name('rapidpro.question.json');
        Route::delete('rapidpro/question/delete/{id}', 'questionDelete')->name('rapidpro.question.delete');

    });

    Route::controller(QuestionManageController::class)->group(function () {

        Route::get('flow/question/edit/{id}', 'editQuestion')->name('flow.question.edit');
        Route::post('flow/question/update/{id}', 'updateQuestion')->name('flow.question.update');
        Route::get('flow/question/delete/{id}', 'delete')->name('flow.question.delete');

    });

    Route::controller(ProfileManageController::class)->group(function () {

        Route::get('user-profile', 'viewProfile')->name('user.profile.view');
        Route::post('profile-update', 'updateProfile')->name('user.profile.update');
        Route::get('user/password/change', 'userPassword')->name('user.change.password');
        Route::post('user/password/update', 'passwordUpdate')->name('user.password.update');

    });

    Route::controller(RegionController::class)->prefix('regions')->group(function () {

        Route::get('/', 'view')->name('regions.view');
        Route::get('/{region}', 'getregionById')->name('regions.getregionById');
        Route::post('/store', 'store')->name('regions.store');
        Route::patch('/update/{region}', 'update')->name('regions.update');
        Route::delete('/regionDelete', 'regiondeleteById')->name('regions.regiondeleteById');

    });

    Route::controller(AdminController::class)->prefix('admins')->group(function () {

        Route::get('/index', 'view')->name('admins.view');
        Route::get('/{admin}', 'getadminById')->name('admins.getadminById');
        Route::post('/store', 'store')->name('admins.store');
        Route::patch('/update/{admin}', 'update')->name('admins.update');
        Route::delete('/admindelete', 'admindelete')->name('admins.admindeleteById');

    });

    Route::controller(NewRegionController::class)->group(function () {

        Route::get('regions-list', 'viewRegion')->name('all.regions.list');
        Route::get('countrywise/details', 'getDetails')->name('country.wise.details');

    });

    Route::get('report/rapid-pro', [\App\Http\Controllers\ReportController::class, 'reportRapidPro'])->name('report.rapidpro');

});
