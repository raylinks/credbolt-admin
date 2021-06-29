<?php

use Illuminate\Support\Facades\Route;
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

Route::prefix('loan')->name('loan.')->group(function () {
    Route::get('/', [ProcessLoanController::class, 'index'])->name('index');
});