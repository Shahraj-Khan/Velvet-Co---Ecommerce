<?php

use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\MomoPaymentController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function () {

    // Public
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);

    // Protected
    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/user', [UserController::class, 'getCurrentUser']);

        Route::post('/logout', [UserController::class, 'logout']);

        Route::match(['put', 'post'], '/profile', [UserController::class, 'updateProfile']);

        Route::put('/password', [UserController::class, 'changePassword']);
    });
});


/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/

Route::controller(ProductController::class)
    ->prefix('products')
    ->group(function () {

        Route::get('/', 'index');

        Route::get('/{category}/category', 'filterProductByCategory');

        Route::get('/{brand}/brand', 'filterProductByBrand');

        Route::get('/{color}/color', 'filterProductByColor');

        Route::get('/{size}/size', 'filterProductBySize');

        Route::get('/{searchTerm}/find', 'findProductByTerm');
    });

Route::get('/product/{product}/show', [ProductController::class, 'show']);


/*
|--------------------------------------------------------------------------
| Reviews
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::controller(ReviewController::class)->group(function () {

        Route::post('/store/review', 'store');

        Route::put('/update/review/{id}', 'update');

        Route::delete('/delete/review/{id}', 'delete');
    });
});


/*
|--------------------------------------------------------------------------
| Coupons
|--------------------------------------------------------------------------
*/

Route::controller(CouponController::class)->group(function () {

    Route::post('/coupons/validate', 'validateCoupon');

    Route::get('/coupons/check-usage', 'checkUserUsage');
});


/*
|--------------------------------------------------------------------------
| Orders
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::controller(OrderController::class)->group(function () {

        // Dashboard
        Route::get('/dashboard/stats', 'dashboardStats');

        // Create Order
        Route::post('/orders/cod', 'createCODOrder');

        // Order Details
        Route::get('/orders/{order}', 'show')->name('orders.show');

        Route::get('/orders/{order}/status', 'checkStatus');

        // User Orders
        Route::get('/user/orders', 'userOrders');

        Route::get('/user/orders/{order}', 'userOrderDetail');

        Route::post('/user/orders/{order}/cancel', 'cancel');
    });
});


/*
|--------------------------------------------------------------------------
| Order Tracking
|--------------------------------------------------------------------------
*/

Route::get('/track-order/{order_code}', [OrderController::class, 'trackOrder']);