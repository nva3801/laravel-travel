<?php

use App\Http\Controllers\Api\FrontendController;
use App\Http\Controllers\Api\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/index', [FrontendController::class, 'index']);
Route::get('/category-item', [FrontendController::class, 'index_category_item']);
Route::get('/category/{slug}', [FrontendController::class, 'category']);
Route::get('/product/{slug}', [FrontendController::class, 'product']);
Route::get('/checkout/{tour_code}', [FrontendController::class, 'checkout']);
Route::post('/checkout-store', [CheckoutController::class, 'store']);
Route::get('/news', [FrontendController::class, 'news']);
Route::get('/news-detail/{slug}', [FrontendController::class, 'news_detail']);
Route::get('/category-local', [FrontendController::class, 'local_address']);
Route::get('/category-overseas', [FrontendController::class, 'overseas']);