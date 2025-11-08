<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //?Done
    public function index(): JsonResponse
    {
        $users = User::all();
        
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }


    public function show($id): JsonResponse
    {
        $user = User::find($id);
        
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
    
   public function update(Request $request, $id): JsonResponse{
    $user = User::find($id);
    
    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404);
    }

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'gender' => ['required', 'in:male,female'],
        'phone' => ['required', 'string', 'max:20'],
        'birthday' => ['required', 'date'],
        'address' => ['required', 'string', 'max:500'],
    ]);

    $user->update($request->only(['name', 'email', 'gender', 'phone', 'birthday', 'address']));

    return response()->json([
        'success' => true,
        'message' => 'User updated successfully',
        'data' => $user
    ]);
}


    //?Done
    public function destroy($id){
        try {
            $user = User::find($id);
            
            if (!$user) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            $user->delete();

            return response()->json([
                'message' => 'User deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}