<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [App\Http\Controllers\Auth\VerificationController::class, 'send'])->middleware(['throttle:6,1'])->name('verification.send');
    Route::post('/email/resend/verification-notification', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->middleware(['throttle:6,1'])->name('verification.resend');

    Route::group(['middleware' => 'verified'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'show'])->name('profile');
        Route::put('/profile', [App\Http\Controllers\HomeController::class, 'update'])->name('profile.update');
        Route::view('/lock-account', 'auth.account-lock')->name('account');
        Route::view('/sttings', 'auth.settings')->name('settings');
        Route::post('/lock-account', [App\Http\Controllers\HomeController::class, 'lock'])->name('account.lock');


        Route::group([
            'prefix' => 'menage',
            'as' => 'menage.'
        ], function () {

            Route::resource('users', UserController::class)->names([
                'index' => 'users',
                'store' => 'users.store',
                'show' => 'users.show',
                'edit' => 'users.edit',
                'update' => 'users.update',
                'destroy' => 'users.destroy',
                'create' => 'users.create'
            ]);
            Route::put('users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.change-password');
            Route::resource('roles', RoleController::class)->names([
                'index' => 'roles',
                'store' => 'roles.store',
                'show' => 'roles.show',
                'edit' => 'roles.edit',
                'update' => 'roles.update',
                'destroy' => 'roles.destroy',
            ])->except('create');
        });
    });
});
