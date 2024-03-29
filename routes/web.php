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

        // User profile
        Route::controller(ProfileController::class)->group(function () {
            Route::get('user-profile', 'index')->name('user.profile');
            Route::get('create-profile', 'create')->name('create.profile');
            Route::get('{id}/edit-profile', 'edit')->name('edit.profile');
            Route::post('store-profile', 'store')->name('store.profile');
            Route::post('update-profile', 'update')->name('update.profile');
            Route::post('delete-profile', 'delete')->name('delete.profile');
        });
    });
});



