<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @group Admin - Users
     */
    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'data' => $users,
        ]);
    }

    /**
     * Store a newly created user (Admin only).
     *
     * @group Admin - Users
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);

            // Set default role if not provided
            if (! isset($data['role'])) {
                $data['role'] = 'customer';
            }

            $user = User::create($data);

            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified user.
     *
     * @group Admin - Users
     */
    public function show(User $user): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $user,
        ]);
    }

    /**
     * Update the specified user.
     *
     * @group Admin - Users
     */
    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        try {
            $user->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $user->fresh(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete user.
     *
     * @group Admin - Users
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return response()->json([
                'message' => 'User deleted successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
