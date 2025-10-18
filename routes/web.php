<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function () {
    // Get authenticated user
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user()
        ]);
    });

    // Update profile
    Route::put('/profile', [ProfileController::class, 'update']);
});
Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
