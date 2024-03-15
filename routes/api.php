<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
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
use App\Http\Controllers\UploadController;
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

    Route::controller(AuthController::class)->prefix('/auth')->name('auth.')->group(function () {
        Route::post('sign-in', 'login');
        Route::post('sign-up', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');

    });

    Route::controller(UserController::class)->prefix('/user')->name('user.')->group(function () {
    });
    Route::controller(ProductController::class)->prefix('/product')->name('product.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(CampaignController::class)->prefix('/campaign')->name('campaign.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(CategoryController::class)->prefix('/category')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    //Route::get('/category', [CategoryController::class, 'index'])->name('category-index');
    //Route::post('/category', [CategoryController::class, 'store'])->name('category-store');

    Route::controller(CommentController::class)->prefix('/comment')->name('comment.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(ContentController::class)->prefix('/content')->name('content.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(CouponController::class)->prefix('/coupon')->name('coupon.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(FavoriteController::class)->prefix('/favorite')->name('favorite.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(MenuController::class)->prefix('/menu')->name('menu.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(MovementController::class)->prefix('/movement')->name('movement.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(PriceController::class)->prefix('/price')->name('price.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(ProductCategoryController::class)->prefix('/product-category')->name('product-category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(RatingController::class)->prefix('/rating')->name('rating.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(UserController::class)->prefix('/user')->middleware('auth:api')->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/me', 'me')->name('me');
        Route::get('/id', 'userId')->name('store');
    });
    Route::controller(VariationController::class)->prefix('/variation')->name('variation.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    Route::controller(UploadController::class)->prefix('/file/upload')->name('upload.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
});

