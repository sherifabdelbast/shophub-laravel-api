<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     *
     * @group Authentication
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
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => new UserResource($user),
                'message' => 'User registered successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle user login.
     *
     * @group Authentication
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
                'user' => new UserResource($user),
                'message' => 'Login successful',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle user logout.
     *
     * @group Authentication
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logged out successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed',
            ], 500);
        }
    }

    /**
     * Redirect to Google OAuth.
     *
     * @group Authentication
     */
    public function redirectToGoogle(): JsonResponse
    {
        try {
            $clientId = config('services.google.client_id');
            $redirectUri = config('services.google.redirect');

            if (empty($clientId)) {
                throw new \Exception('Google Client ID is missing');
            }

            $authUrl = 'https://accounts.google.com/o/oauth2/v2/auth?'.http_build_query([
                'client_id' => $clientId,
                'redirect_uri' => $redirectUri,
                'response_type' => 'code',
                'scope' => 'openid email profile',
                'access_type' => 'online',
                'prompt' => 'select_account',
            ]);

            return response()->json([
                'success' => true,
                'url' => $authUrl,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Google OAuth configuration error',
            ], 500);
        }
    }

    /**
     * Handle Google OAuth callback.
     *
     * @group Authentication
     */
    public function handleGoogleCallback(Request $request): JsonResponse
    {
        try {
            if (! $request->has('code')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authorization code not found',
                ], 400);
            }

            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (! $user) {
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
                'user' => new UserResource($user),
                'message' => 'Google login successful',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Google login failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
