<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Register user and create token
     */
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'gender' => 'required|string|in:male,female', // 👈 جديد
                'birthday' => 'required|date|before:today', // 👈 جديد
                'phone' => 'required|string|min:8|max:20', // 👈 جديد
                'address' => 'required|string|min:5|max:255', // 👈 جديد
                'password' => 'required|string|min:6', // تغيير من 8 إلى 6 لتتناسب مع Angular
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'birthday' => $request->birthday,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);
            
            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'gender'=>$request->gender,
                    'phone'=>$request->phone,
                    'birthday' => $request->birthday,
                    'address' => $request->address,
                    'email' => $user->email,

                    'email_verified_at' => $user->email_verified_at,
                ],
                'message' => 'User registered successfully'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Login user and create token
     */
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid email or password'
                ], 401);
            }

            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'gender' => $user->gender,
                    'phone' => $user->phone,
                    'birthday' => $user->birthday,
                    'address' => $user->address,
                    'email_verified_at' => $user->email_verified_at,
                ],
                'message' => 'Login successful'
            ]);


        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
public function updateProfile(Request $request)
{
    try {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
            'birthday' => 'nullable|date|before:today',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $user->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'user' => $user,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Server error: ' . $e->getMessage(),
        ], 500);
    }
}



    /**
     * Get authenticated user profile
     */
//     public function profile(Request $request)
//     {
//         try {
//             $user = $request->user();

// return response()->json([
//     'success' => true,
//     'token' => $token,
//     'user' => [
//         'id' => $user->id,
//         'name' => $user->name,
//         'email' => $user->email,
//         'gender' => $user->gender,
//         'phone' => $user->phone,
//         'birthday' => $user->birthday,
//         'address' => $user->address,
//         'email_verified_at' => $user->email_verified_at,
//     ],
//     // 'message' => 'Login successful'
// ]);


//         } catch (\Exception $e) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Failed to fetch profile'
//             ], 500);
//         }
//     }

    /**
     * Logout user (revoke token)
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logged out successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed'
            ], 500);
        }
    }
}