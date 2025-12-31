<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Route Groups:
| 1. Public Routes - No authentication required
| 2. Auth Routes - Authentication endpoints
| 3. Protected Routes - Requires auth:sanctum
| 4. Admin Routes - Requires auth:sanctum + admin role
|
*/

// ==========================================================================
// PUBLIC ROUTES (No authentication required)
// ==========================================================================
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/form/data', [ProductController::class, 'getFormData']);
    Route::get('/{product}', [ProductController::class, 'show']);
    Route::get('/{product}/reviews', [ReviewController::class, 'index']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/parent-categories', [CategoryController::class, 'getParentCategories']);
    Route::get('/{category}', [CategoryController::class, 'show']);
});

Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::get('/{brand}', [BrandController::class, 'show']);
});

// Shipping Methods (Public - for checkout)
Route::prefix('shipping-methods')->group(function () {
    Route::get('/', [ShippingMethodController::class, 'index']);
});

// Coupon Validation (Public)
Route::post('/coupons/validate', [CouponController::class, 'validateCoupon']);

// ==========================================================================
// AUTHENTICATION ROUTES (Guest only - with rate limiting)
// ==========================================================================
Route::prefix('auth')->middleware('throttle:10,1')->group(function () {
    // Guest routes (not authenticated)
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);
    Route::post('/reset-password', [NewPasswordController::class, 'store']);

    // Google OAuth routes
    Route::get('/google', [AuthController::class, 'redirectToGoogle']);
    Route::get('/google/callback', [AuthController::class, 'handleGoogleCallback']);
});

// ==========================================================================
// PROTECTED ROUTES (Authenticated users only)
// ==========================================================================
Route::middleware('auth:sanctum')->group(function () {

    // User Profile Routes
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);

    // Addresses Management
    Route::prefix('addresses')->group(function () {
        Route::get('/', [AddressController::class, 'index']);
        Route::post('/', [AddressController::class, 'store']);
        Route::get('/{address}', [AddressController::class, 'show']);
        Route::put('/{address}', [AddressController::class, 'update']);
        Route::delete('/{address}', [AddressController::class, 'destroy']);
        Route::patch('/{address}/set-default', [AddressController::class, 'setDefault']);
    });

    // Shopping Cart
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index']);
        Route::post('/', [CartController::class, 'store']);
        Route::put('/{cartItem}', [CartController::class, 'update']);
        Route::delete('/{cartItem}', [CartController::class, 'destroy']);
        Route::delete('/', [CartController::class, 'clear']);
    });

    // Wishlist
    Route::prefix('wishlist')->group(function () {
        Route::get('/', [WishlistController::class, 'index']);
        Route::post('/', [WishlistController::class, 'store']);
        Route::delete('/{wishlist}', [WishlistController::class, 'destroy']);
        Route::get('/check/{product}', [WishlistController::class, 'check']);
    });

    // Orders
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::post('/', [OrderController::class, 'store']);
        Route::get('/{order}', [OrderController::class, 'show']);
        Route::patch('/{order}/cancel', [OrderController::class, 'cancel']);
    });

    // Payments
    Route::prefix('payments')->group(function () {
        Route::post('/', [PaymentController::class, 'store']);
        Route::get('/{payment}', [PaymentController::class, 'show']);
        Route::get('/order/{order}', [PaymentController::class, 'getOrderPayments']);
    });

    // Reviews
    Route::prefix('reviews')->group(function () {
        Route::post('/', [ReviewController::class, 'store']);
        Route::put('/{review}', [ReviewController::class, 'update']);
        Route::delete('/{review}', [ReviewController::class, 'destroy']);
        Route::post('/{review}/helpful', [ReviewController::class, 'markHelpful']);
    });
});

// ==========================================================================
// ADMIN ROUTES (Authenticated + Admin role required)
// ==========================================================================
Route::prefix('admin')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(function () {

        // Dashboard stats (optional)
        // Route::get('/dashboard', [AdminController::class, 'dashboard']);

        // Products Management
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index']);
            Route::get('/form/data', [ProductController::class, 'getFormData']);
            Route::post('/', [ProductController::class, 'store']);
            Route::get('/{product}', [ProductController::class, 'show']);
            Route::put('/{product}', [ProductController::class, 'update']);
            Route::patch('/{product}/status', [ProductController::class, 'updateStatus']);
            Route::delete('/{product}', [ProductController::class, 'destroy']);
        });

        // Categories Management
        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('/parent-categories', [CategoryController::class, 'getParentCategories']);
            Route::post('/', [CategoryController::class, 'store']);
            Route::get('/{category}', [CategoryController::class, 'show']);
            Route::put('/edit/{category}', [CategoryController::class, 'update']);
            Route::patch('/{category}/status', [CategoryController::class, 'updateStatus']);
            Route::delete('/{category}', [CategoryController::class, 'destroy']);
        });

        // Brands Management
        Route::prefix('brands')->group(function () {
            Route::get('/', [BrandController::class, 'index']);
            Route::post('/', [BrandController::class, 'store']);
            Route::get('/{brand}', [BrandController::class, 'show']);
            Route::put('/{brand}', [BrandController::class, 'update']);
            Route::patch('/{brand}/status', [BrandController::class, 'updateStatus']);
            Route::delete('/{brand}', [BrandController::class, 'destroy']);
        });

        // Users Management
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/{user}', [UserController::class, 'show']);
            Route::put('/{user}', [UserController::class, 'update']);
            Route::delete('/{user}', [UserController::class, 'destroy']);
        });

        // Coupons Management
        Route::prefix('coupons')->group(function () {
            Route::get('/', [CouponController::class, 'index']);
            Route::post('/', [CouponController::class, 'store']);
            Route::get('/{coupon}', [CouponController::class, 'show']);
            Route::put('/{coupon}', [CouponController::class, 'update']);
            Route::delete('/{coupon}', [CouponController::class, 'destroy']);
        });

        // Shipping Methods Management
        Route::prefix('shipping-methods')->group(function () {
            Route::get('/', [ShippingMethodController::class, 'adminIndex']);
            Route::post('/', [ShippingMethodController::class, 'store']);
            Route::get('/{shippingMethod}', [ShippingMethodController::class, 'show']);
            Route::put('/{shippingMethod}', [ShippingMethodController::class, 'update']);
            Route::delete('/{shippingMethod}', [ShippingMethodController::class, 'destroy']);
        });

        // Reviews Management
        Route::prefix('reviews')->group(function () {
            Route::get('/', [ReviewController::class, 'adminIndex']);
            Route::patch('/{review}/approve', [ReviewController::class, 'approve']);
            Route::patch('/{review}/reject', [ReviewController::class, 'reject']);
        });

        // Payments Management
        Route::prefix('payments')->group(function () {
            Route::patch('/{payment}/refund', [PaymentController::class, 'refund']);
        });
    });
