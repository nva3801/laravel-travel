<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryItemController;
use App\Http\Controllers\CategoryListController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\TourCodeController;
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
Route::resource('category', CategoryController::class);
Route::resource('category-list', CategoryListController::class);
Route::resource('category-item', CategoryItemController::class);
Route::resource('product', ProductController::class);
Route::get('product-show-image/{id}', [ProductController::class, 'showImage'])->name('product-show-image');
Route::get('product-show-time/{id}', [ProductController::class, 'showTime'])->name('product-show-time');
Route::resource('product-image', ProductImageController::class);
Route::resource('product-tourcode', TourCodeController::class);
Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::resource('news', NewsController::class);