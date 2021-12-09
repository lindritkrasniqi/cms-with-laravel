<?php

use App\Http\Controllers\Auth\LockAccountController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\PremissionController;
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

/**
 * Group of routes under "auth" middleware
 */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [App\Http\Controllers\Auth\VerificationController::class, 'send'])->middleware(['throttle:6,1'])->name('verification.send');
    Route::post('/email/resend/verification-notification', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->middleware(['throttle:6,1'])->name('verification.resend');

    /**
     * Group of routes under "verified" middleware
     */
    Route::group(['middleware' => 'verified'], function () {
        Route::view('/home', 'home')->name('home');

        /**
         * Profile endpoints
         */
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        /**
         * Settings endpoints
         */
        Route::view('/settings', 'auth.settings')->name('settings');

        /**
         * Lock account endpoints
         */
        Route::view('/lock-account', 'auth.lock')->name('lock');
        Route::delete('/lock-account', LockAccountController::class)->name('account.lock');

        /**
         * Group of routes under prefix "menage" named as 'menage.*'
         */
        Route::group([
            'prefix' => 'menage',
            'as' => 'menage.'
        ], function () {

            /** 
             * Users routes
             */
            Route::get('users/trashed', [UserController::class, 'trashed'])->name('users.trashed');
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
            Route::put('users/{user}/restore', [UserController::class, 'restore'])->withTrashed()->name('users.restore');
            Route::delete('users/{user}/delete', [UserController::class, 'delete'])->withTrashed()->name('users.delete');

            /**
             * Roles/Premissions routes
             */
            Route::resource('roles', RoleController::class)->names([
                'index' => 'roles',
                'store' => 'roles.store',
                'show' => 'roles.show',
                'edit' => 'roles.edit',
                'update' => 'roles.update',
                'destroy' => 'roles.destroy',
            ])->except('create');
            Route::post('roles/{role}/premissions', [PremissionController::class, 'store'])->name('premissions.store');
            Route::put('premissions/{premission}', [PremissionController::class, 'update'])->name('premissions.update');
            Route::delete('premissions/{premission}', [PremissionController::class, 'destroy'])->name('premissions.destroy');
        });
    });
});
