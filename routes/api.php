<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

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

//==========================================================================
// PUBLIC ROUTES (No authentication required)
//==========================================================================
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/form/data', [ProductController::class, 'getFormData']);
    Route::get('/{product}', [ProductController::class, 'show']);
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

//==========================================================================
// AUTHENTICATION ROUTES (Guest only - with rate limiting)
//==========================================================================
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

//==========================================================================
// PROTECTED ROUTES (Authenticated users only)
//==========================================================================
Route::middleware('auth:sanctum')->group(function () {

    // User Profile Routes
    Route::prefix('auth')->group(function () {
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::put('/update-profile', [AuthController::class, 'updateProfile']);
    });

    // User-specific actions (wishlist, cart, orders, etc.) can be added here
    // Route::prefix('wishlist')->group(function () { ... });
    // Route::prefix('cart')->group(function () { ... });
    // Route::prefix('orders')->group(function () { ... });
});

//==========================================================================
// ADMIN ROUTES (Authenticated + Admin role required)
//==========================================================================
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
    });
