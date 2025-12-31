<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Get authenticated user profile.
     *
     * @group Profile
     */
    public function show(Request $request): JsonResponse
    {
        try {
            $user = $request->user()->load(['addresses']);

            return response()->json([
                'success' => true,
                'data' => new UserResource($user),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get profile',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update authenticated user profile.
     *
     * @group Profile
     */
    public function update(UpdateProfileRequest $request): JsonResponse
    {
        try {
            $user = $request->user();
            $user->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully',
                'data' => new UserResource($user->fresh()),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server error: '.$e->getMessage(),
            ], 500);
        }
    }
}
