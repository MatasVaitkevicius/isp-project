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
    return view('auth.login');
});

Auth::routes();

Route::get('/workerHome', [App\Http\Controllers\WorkerController::class, 'index'])->name('workerHome');
Route::get('/viewProducts', [App\Http\Controllers\ProductController::class, 'viewProductsList'])->name('viewProductsList');
Route::get('/viewFilteredProducts', [App\Http\Controllers\ProductController::class, 'viewFilteredProducts'])->name('viewFilteredProducts');
Route::get('/viewFilteredProductsAfterTwoFilters', [App\Http\Controllers\ProductController::class, 'viewFilteredProductsAfterTwoFilters'])->name('viewFilteredProductsAfterTwoFilters');
Route::get('/viewPurchaseHistory', [App\Http\Controllers\BuyerController::class, 'viewPurchaseHistory'])->name('viewPurchaseHistory');

Route::get('/viewWriteReview/{product}', [App\Http\Controllers\BuyerController::class, 'viewWriteReview'])->name('viewWriteReview');
Route::get('/leaveReview/{product}', [App\Http\Controllers\BuyerController::class, 'leaveReview'])->name('leaveReview');

Route::get('/viewSingeProduct/{product}', [App\Http\Controllers\ProductController::class, 'viewSingleProduct'])->name('viewSingleProduct');
Route::get('/buyProduct/{product}', [App\Http\Controllers\ProductController::class, 'buyProduct'])->name('buyProduct');

Route::get('/viewUnconfirmedProducts', [App\Http\Controllers\ProductController::class, 'viewUnconfirmedProductsList'])->name('viewUnconfirmedProductsList');
Route::post('/confirmProduct/{product}', [App\Http\Controllers\ProductController::class, 'confirmProduct'])->name('confirmProduct');


Route::get('/viewSellers', [App\Http\Controllers\SellerController::class, 'viewSellersList'])->name('viewSellersList');
Route::delete('/deleteSeller/{user}', [App\Http\Controllers\SellerController::class, 'deleteSeller'])->name('deleteSeller');

Route::get('/viewBuyers', [App\Http\Controllers\BuyerController::class, 'viewBuyersList'])->name('viewBuyersList');
Route::delete('/deleteBuyer/{user}', [App\Http\Controllers\BuyerController::class, 'deleteBuyer'])->name('deleteBuyer');

Route::get('/productsReport', [App\Http\Controllers\ProductController::class, 'productsReport'])->name('productsReport');
Route::get('/generateReport', [App\Http\Controllers\ProductController::class, 'generateReport'])->name('generateReport');

Route::get('/viewWorkers', [App\Http\Controllers\AdminController::class, 'viewWorkersList'])->name('viewWorkersList');
Route::delete('/deleteWorker/{user}', [App\Http\Controllers\AdminController::class, 'deleteWorker'])->name('deleteWorker');
Route::get('/createWorker', [App\Http\Controllers\AdminController::class, 'createWorker'])->name('createWorker');
Route::post('/createWorker', [App\Http\Controllers\AdminController::class, 'createWorkerPost'])->name('createWorkerPost');
Route::get('/viewWorkerInfo/{user}', [App\Http\Controllers\AdminController::class, 'viewWorkerInfo'])->name('viewWorkerInfo');
Route::post('/updateWorker/{user}', [App\Http\Controllers\AdminController::class, 'updateWorker'])->name('updateWorker');

Route::get('/adminHome', [App\Http\Controllers\AdminController::class, 'index'])->name('adminHome');

Route::get('/buyerHome', [App\Http\Controllers\BuyerController::class, 'index'])->name('buyerHome');

Route::get('/sellerHome', [App\Http\Controllers\SellerController::class, 'index'])->name('sellerHome');
Route::get('/newProduct', [App\Http\Controllers\SellerController::class, 'newProduct'])->name('newProduct');
Route::post('/newProduct', [App\Http\Controllers\SellerController::class, 'newProductPost'])->name('newProductPost');
Route::get('/viewSellersProductsList', [App\Http\Controllers\SellerController::class, 'viewSellersProductsList'])->name('viewSellersProductsList');
Route::delete('/deleteProduct/{product}', [App\Http\Controllers\SellerController::class, 'deleteProduct'])->name('deleteProduct');
Route::get('/viewSellersProductInfo/{product}', [App\Http\Controllers\SellerController::class, 'viewSellersProductInfo'])->name('viewSellersProductInfo');
Route::post('/updateProduct/{product}', [App\Http\Controllers\SellerController::class, 'updateProduct'])->name('updateProduct');
Route::get('/viewAPI', [App\Http\Controllers\SellerController::class, 'viewAPI'])->name('viewAPI');
