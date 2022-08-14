<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::group(['prefix' => '/admin'], function(){

    Route::get('register', [RegisteredUserController::class, 'create_admin'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store_admin']);


    Route::get('login', [AuthenticatedSessionController::class, 'admin_login_page'])->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, 'admin_login']);



    Route::group(['middleware' => 'admin'], function(){

        Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin-dashboard');

        Route::get('users', [AdminDashboardController::class, 'all_users']);

        Route::get('users/{id}/activate', [AdminDashboardController::class, 'activate_user']);

        Route::get('messages', [AdminDashboardController::class, 'messages']);
        
    });

});


Route::get('/test', function(){
    return view('admin.users');
});



