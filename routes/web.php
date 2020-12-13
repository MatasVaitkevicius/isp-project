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
Route::get('/viewProducts', [App\Http\Controllers\ProductController::class, 'viewProductsList'])->name('viewProductsList');
Route::get('/viewFilteredProducts', [App\Http\Controllers\ProductController::class, 'viewFilteredProducts'])->name('viewFilteredProducts');
Route::get('/viewPurchaseHistory', [App\Http\Controllers\SellerController::class, 'viewPurchaseHistory'])->name('viewPurchaseHistory');

Route::get('/viewWriteReview/{product}', [App\Http\Controllers\SellerController::class, 'viewWriteReview'])->name('viewWriteReview');

Route::get('/viewSingeProduct/{product}', [App\Http\Controllers\ProductController::class, 'viewSingleProduct'])->name('viewSingleProduct');

Route::get('/viewUnconfirmedProducts', [App\Http\Controllers\ProductController::class, 'viewUnconfirmedProductsList'])->name('viewUnconfirmedProductsList');


Route::get('/viewSellers', [App\Http\Controllers\SellerController::class, 'viewSellersList'])->name('viewSellersList');
Route::delete('/deleteSeller/{user}', [App\Http\Controllers\SellerController::class, 'deleteSeller'])->name('deleteSeller');

Route::get('/viewBuyers', [App\Http\Controllers\BuyerController::class, 'viewBuyersList'])->name('viewBuyersList');
Route::delete('/deleteBuyer/{user}', [App\Http\Controllers\BuyerController::class, 'deleteBuyer'])->name('deleteBuyer');

Route::get('/viewWorkers', [App\Http\Controllers\AdminController::class, 'viewWorkersList'])->name('viewWorkersList');
Route::delete('/deleteWorker/{user}', [App\Http\Controllers\AdminController::class, 'deleteWorker'])->name('deleteWorker');
Route::get('/createWorker', [App\Http\Controllers\AdminController::class, 'createWorker'])->name('createWorker');
Route::post('/createWorker', [App\Http\Controllers\AdminController::class, 'createWorkerPost'])->name('createWorkerPost');
Route::get('/viewWorkerInfo/{user}', [App\Http\Controllers\AdminController::class, 'viewWorkerInfo'])->name('viewWorkerInfo');
Route::post('/updateWorker/{user}', [App\Http\Controllers\AdminController::class, 'updateWorker'])->name('updateWorker');

Route::get('/adminHome', [App\Http\Controllers\AdminController::class, 'index'])->name('adminHome');

Route::get('/buyerHome', [App\Http\Controllers\BuyerController::class, 'index'])->name('buyerHome');

Route::get('/sellerHome', [App\Http\Controllers\SellerController::class, 'index'])->name('sellerHome');
