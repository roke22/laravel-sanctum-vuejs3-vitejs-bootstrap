<?php

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

/**
 * Login, Logout, forget password and reset password routes
 */
Route::post('/user', [App\Http\Controllers\Auth\CreateUserController::class, 'create'])->name('users.create');
Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}',[App\Http\Controllers\Auth\ForgotPasswordController::class, 'checkToken'] )->name('password.checkToken');
Route::post('/reset-password',[App\Http\Controllers\Auth\ForgotPasswordController::class, 'resetPassword'] )->name('password.reset');
Route::middleware('web')->post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('users.login');
Route::middleware('web')->get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('users.logout');

/**
 * Get user route
 */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/data', [App\Http\Controllers\DataController::class, 'getData'])->name('datatable.get');
});
