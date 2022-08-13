<?php

use App\Http\Controllers\UserDashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/api', function(){
    return "API";
});

Route::get('/pending', function(){
    return view('pending');
});

// Route::get('/user/dashboard', [UserDashboardController::class, 'dashboard']);










Route::group(['middleware' => 'auth'], function(){

    Route::get('/user/dashboard', function(){
        return view('dashboard');
    })->name('user.dashboard');

    Route::get('messages', [UserDashboardController::class, 'user_messages'])->name('user.messages');
    Route::get('send-message', [UserDashboardController::class, 'send_message_page'])->name('send-message-page');
    Route::post('send', [UserDashboardController::class, 'send_message'])->name('send-message');
    
});



require __DIR__.'/admin.php';

require __DIR__.'/auth.php';
