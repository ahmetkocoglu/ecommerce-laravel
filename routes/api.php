<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationController;
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

Route::get('/', function (Request $request) {
    return response()->json('service start');
});

Route::post('/', function (Request $request) {
    return response()->json('service start');
});

Route::prefix('v1')->group(function () {
    Route::get('/', function (Request $request) {
        return response()->json('service start => get');
    });

    Route::post('/', function (Request $request) {
        return response()->json('service start => post');
    });

    Route::get('/product', [ProductController::class, 'index'])->name('product-index');
    Route::post('/product', [ProductController::class, 'store'])->name('product-store');

    Route::get('/price', [PriceController::class, 'index'])->name('product-index');
    Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign-index');

    Route::controller(CategoryController::class)->prefix('/category')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    //Route::get('/category', [CategoryController::class, 'index'])->name('category-index');
    //Route::post('/category', [CategoryController::class, 'store'])->name('category-store');

    Route::get('/comment', [CommentController::class, 'index'])->name('comment-index');
    Route::get('/content', [ContentController::class, 'index'])->name('content-index');
    Route::get('/coupon', [CouponController::class, 'index'])->name('coupon-index');
    Route::get('/menu', [MenuController::class, 'index'])->name('menu-index');
    Route::get('/movement', [MovementController::class, 'index'])->name('movement-index');
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite-index');
    Route::get('/product-category', [ProductCategoryController::class, 'index'])->name('product-category-index');
    Route::get('/rating', [RatingController::class, 'index'])->name('rating-index');
    Route::get('/user', [UserController::class, 'index'])->name('user-index');
    Route::get('/variation', [VariationController::class, 'index'])->name('variation-index');
});

