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
    Route::get('/{id}', [ProductController::class, 'show']);        // GET /api/products/1
    Route::get('/form/data', [ProductController::class, 'getFormData']); // GET /api/products/form/data
    Route::patch('/{id}/status', [ProductController::class, 'updateStatus']);    Route::post('/new-product', [ProductController::class, 'store']);          // POST /api/products
    Route::put('/{id}', [ProductController::class, 'update']);      // PUT /api/products/1
    Route::delete('/{id}', [ProductController::class, 'destroy']);  // DELETE /api/products/1
});
//?----------------------------Admin---------------------------------------------------
Route::prefix('admin')->group(function () {
    // Products Routes
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/form/data', [ProductController::class, 'getFormData']);
        Route::post('/create', [ProductController::class, 'store']);
        Route::patch('/{id}/status', [ProductController::class, 'updateStatus']);
        Route::put('/edit/{id}', [ProductController::class, 'update']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    });
     // Categories Routes
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/parent-categories', [CategoryController::class, 'getParentCategories']);
        Route::get('/{id}', [CategoryController::class, 'show']);
        Route::put('/edit/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
        Route::patch('/{id}/status', [CategoryController::class, 'updateStatus']);
    });

    // Brands Routes
    Route::prefix('brands')->group(function () {
        Route::get('/', [BrandController::class, 'index']);
        Route::post('/', [BrandController::class, 'store']);
        Route::get('/{id}', [BrandController::class, 'show']);
        Route::put('/{id}', [BrandController::class, 'update']);
        Route::delete('/{id}', [BrandController::class, 'destroy']);
        Route::patch('/{id}/status', [BrandController::class, 'updateStatus']);
    });
    // Users Routes
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::get('/{id}', [UserController::class, 'show']);
    });
});
