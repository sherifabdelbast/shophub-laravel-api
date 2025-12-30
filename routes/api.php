<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
//?----------------------User------------------------------------------------
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);
    Route::post('/reset-password', [NewPasswordController::class, 'store']);
    //?Google OAuth routes------------------------------
    Route::get('/google', [AuthController::class, 'redirectToGoogle']);
    Route::get('/google/callback', [AuthController::class, 'handleGoogleCallback']);
    //?-------------------------------------------------
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::put('/update-profile', [AuthController::class, 'updateProfile']);
    });
});


Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);           // GET /api/products
    Route::get('/form/data', [ProductController::class, 'getFormData']); // GET /api/products/form/data
    Route::get('/{product}', [ProductController::class, 'show']);        // GET /api/products/1

});

//?----------------------------Admin---------------------------------------------------
Route::prefix('admin')->group(function () {
    // Products Routes
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/form/data', [ProductController::class, 'getFormData']);
        Route::post('/create', [ProductController::class, 'store']);
        Route::get('/{product}', [ProductController::class, 'show']);
        Route::put('/edit/{product}', [ProductController::class, 'update']);
        Route::patch('/{product}/status', [ProductController::class, 'updateStatus']);
        Route::delete('/{product}', [ProductController::class, 'destroy']);
    });
     // Categories Routes
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/parent-categories', [CategoryController::class, 'getParentCategories']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{category}', [CategoryController::class, 'show']);
        Route::put('/edit/{category}', [CategoryController::class, 'update']);
        Route::patch('/{category}/status', [CategoryController::class, 'updateStatus']);
        Route::delete('/{category}', [CategoryController::class, 'destroy']);
    });

    // Brands Routes
    Route::prefix('brands')->group(function () {
        Route::get('/', [BrandController::class, 'index']);
        Route::post('/', [BrandController::class, 'store']);
        Route::get('/{brand}', [BrandController::class, 'show']);
        Route::put('/{brand}', [BrandController::class, 'update']);
        Route::patch('/{brand}/status', [BrandController::class, 'updateStatus']);
        Route::delete('/{brand}', [BrandController::class, 'destroy']);
    });
    // Users Routes
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{user}', [UserController::class, 'show']);
        Route::put('/{user}', [UserController::class, 'update']);
        Route::delete('/{user}', [UserController::class, 'destroy']);
    });
});
