<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcessLoanController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::view('/dashboard', 'admin.index')->name('dashboard');

//Route::view('dashboard', 'admin.index');

Route::view('/', 'admin.index')->name('dashboard');
Route::get('register', [RegisterController::class, 'index'])->name('register');

Route::post('register', [RegisterController::class, 'register'])->name('register');

//Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
    Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::get('admin/users/{user}', [AdminController::class, 'show'])->name('admin.users.show');
    Route::post('{user}/admin/users', [AdminController::class, 'update'])->name('admin.update');


    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/customer', [UserController::class, 'index'])->name('index');
        Route::get('/customer/show/{user}', [UserController::class, 'show'])->name('show');
    });


    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/customer/show/{user}', [UserController::class, 'show'])->name('show');
    });


    Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/registered/users', [UserController::class, 'index'])->name('index');
    Route::get('/registered/users/{user}', [UserController::class, 'show'])->name('show');
    });

Route::prefix('loan')->name('loan.')->group(function () {
    Route::get('/', [ProcessLoanController::class, 'index'])->name('index');
    Route::get('/show', [ProcessLoanController::class, 'show'])->name('show');
});

});


Route::name('auth.')->middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('password.forgot');
    Route::post('forgot-password', [ForgotPasswordController::class, 'reset'])->name('password.forgot');

    Route::get('reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset.token');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');
});