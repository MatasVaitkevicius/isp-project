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

Route::get('/workerHome', [App\Http\Controllers\WorkerController::class, 'index'])->name('workerHome');

Route::get('/adminHome', [App\Http\Controllers\AdminController::class, 'index'])->name('adminHome');

Route::get('/buyerHome', [App\Http\Controllers\BuyerController::class, 'index'])->name('buyerHome');

Route::get('/sellerHome', [App\Http\Controllers\SellerController::class, 'index'])->name('sellerHome');
