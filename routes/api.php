<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
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

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/', function (Request $request) {
        return response()->json(true);
    });

    Route::get('/product', [ProductController::class, 'index'])->name('product-index');
    Route::get('/price', [PriceController::class, 'index'])->name('product-index');
    Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign-index');
    Route::get('/category', [CategoryController::class, 'index'])->name('category-index');
    Route::get('/comment', [CommentController::class, 'index'])->name('comment-index');
    Route::get('/content', [ContentController::class, 'index'])->name('content-index');
    Route::get('/coupon', [CouponController::class, 'index'])->name('coupon-index');
});

