<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);   // GET /api/users
    Route::get('/{id}', [UserController::class, 'show']); // GET /api/users/{id}
    // Route::post('/create', [UserController::class, 'store']);   // POST /api/users
    Route::post('/create', [AuthController::class, 'register']);   // POST /api/users
    Route::delete('/{id}', [UserController::class, 'delete']); // DELETE /api/users/{id}
    Route::put('/edit/{id}', [UserController::class, 'update']); // PUT /api/users/{id}
});

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // دي بس اللي مفتوحة من غير توثيق
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::put('/update-profile', [AuthController::class, 'updateProfile']);
    });
});


// // Protected routes
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', function (Request $request) {
//         return response()->json([
//             'user' => $request->user()
//         ]);
//     });
// });