<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\UpdateProfileRequest;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $this->formatUserResponse($user),
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
     * Handle user login.
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            // Authenticate using the LoginRequest (includes rate limiting)
            $request->authenticate();

            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $this->formatUserResponse($user),
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

    /**
     * Get authenticated user profile.
     */
    public function profile(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            return response()->json([
                'success' => true,
                'user' => $this->formatUserResponse($user)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update authenticated user profile.
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        try {
            $user = $request->user();
            $user->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully',
                'user' => $this->formatUserResponse($user->fresh()),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request): JsonResponse
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

    /**
     * Redirect to Google OAuth.
     */
    public function redirectToGoogle(): JsonResponse
    {
        try {
            $clientId = config('services.google.client_id');
            $redirectUri = config('services.google.redirect');

            if (empty($clientId)) {
                throw new \Exception('Google Client ID is missing');
            }

            $authUrl = "https://accounts.google.com/o/oauth2/v2/auth?" . http_build_query([
                'client_id' => $clientId,
                'redirect_uri' => $redirectUri,
                'response_type' => 'code',
                'scope' => 'openid email profile',
                'access_type' => 'online',
                'prompt' => 'select_account',
            ]);

            return response()->json([
                'success' => true,
                'url' => $authUrl
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Google OAuth configuration error'
            ], 500);
        }
    }

    /**
     * Handle Google OAuth callback.
     */
    public function handleGoogleCallback(Request $request): JsonResponse
    {
        try {
            if (!$request->has('code')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authorization code not found'
                ], 400);
            }

            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $nameParts = explode(' ', $googleUser->getName(), 2);
                $user = User::create([
                    'first_name' => $nameParts[0] ?? 'User',
                    'last_name' => $nameParts[1] ?? '',
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(Str::random(24)),
                    'provider' => 'google',
                    'provider_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                    'gender' => 'male',
                    'phone' => '',
                    'birthday' => now()->subYears(20)->format('Y-m-d'),
                    'address' => '',
                ]);
            } else {
                $user->update([
                    'provider' => 'google',
                    'provider_id' => $googleUser->getId(),
                ]);
            }

            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $this->formatUserResponse($user),
                'message' => 'Google login successful'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Google login failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Format user data for API response.
     */
    private function formatUserResponse(User $user): array
    {
        return [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'name' => $user->full_name,
            'email' => $user->email,
            'gender' => $user->gender,
            'phone' => $user->phone,
            'birthday' => $user->birthday,
            'address' => $user->address,
            'email_verified_at' => $user->email_verified_at,
        ];
    }
}
