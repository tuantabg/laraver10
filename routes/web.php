<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

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

/* BACKEND ROUTES */

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->middleware('admin')->name('auth.login');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/login-store', 'loginStore')->name('auth.login.store');
    Route::post('/register-store', 'registerStore')->name('auth.register.store');
    Route::get('/logout','logout')->name('auth.logout');
});

Route::group(['prefix' => 'admin/'], function() {
    Route::middleware(['authenticate'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('user-profile', [ProfileController::class, 'index'])->name('user.profile');
        Route::get('create-profile', [ProfileController::class, 'create'])->name('create.profile');
        Route::get('store-profile', [ProfileController::class, 'store'])->name('store.profile');
    });
});



