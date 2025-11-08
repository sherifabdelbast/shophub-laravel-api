<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
Route::prefix('admin/products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);  
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::get('/form/data', [ProductController::class, 'getFormData']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::patch('/{id}/status', [ProductController::class, 'updateStatus']);
    Route::put('edit/{id}', [ProductController::class, 'update']);      // PUT /api/products/1
    Route::delete('/{id}', [ProductController::class, 'destroy']); 
});
Route::prefix('admin/users')->group(function () {
    Route::get('/', [UserController::class, 'index']); // GET - Index (show all users)
    Route::get('/{id}', [UserController::class, 'show']); // GET - Show (single user)
    Route::put('/{id}', [UserController::class, 'update']); // PUT - Update user
    Route::delete('/{id}', [UserController::class, 'destroy']); // DELETE - Delete user
});

