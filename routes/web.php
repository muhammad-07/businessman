<?php

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments');
Route::get('/total_transfers', [App\Http\Controllers\PaymentController::class, 'total_transfers_by_bank'])->name('total_transfers');
Route::get('/current_balance', [App\Http\Controllers\PaymentController::class, 'current_balance'])->name('current_balance');

