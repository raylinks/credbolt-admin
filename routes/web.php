<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProcessLoanController;

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

Route::view('/dashboard', 'admin.index')->name('dashboard');

Route::name('auth.')->middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('password.forgot');
    Route::post('forgot-password', [ForgotPasswordController::class, 'reset'])->name('password.forgot');

    Route::get('reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset.token');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');
});

Route::prefix('loan')->name('loan.')->group(function () {
    Route::get('/', [ProcessLoanController::class, 'index'])->name('index');
});

