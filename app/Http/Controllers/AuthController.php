<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Handle user registration. Logs the user in via session cookie (Sanctum SPA mode).
     *
     * @group Authentication
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'user' => new UserResource($user),
            'message' => 'User registered successfully',
        ], 201);
    }

    /**
     * Handle user login. Establishes a session cookie (Sanctum SPA mode).
     *
     * @group Authentication
     */
    public function login(LoginRequest $request): JsonResponse
    {
        // Authenticate using the LoginRequest (includes rate limiting).
        // HttpResponseException will be thrown for invalid credentials (401).
        $request->authenticate();
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'user' => new UserResource(Auth::user()),
            'message' => 'Login successful',
        ]);
    }

    /**
     * Return the currently authenticated user.
     *
     * @group Authentication
     */
    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'user' => new UserResource($request->user()),
        ]);
    }

    /**
     * Handle user logout. Destroys the session.
     *
     * @group Authentication
     */
    public function logout(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }

    /**
     * Redirect to Google OAuth.
     *
     * @group Authentication
     */
    public function redirectToGoogle(): JsonResponse
    {
        $clientId = config('services.google.client_id');
        $redirectUri = config('services.google.redirect');

        if (empty($clientId)) {
            return response()->json([
                'success' => false,
                'message' => 'Google OAuth configuration error',
            ], 500);
        }

        $state = Str::random(40);
        Cache::put("oauth_state_{$state}", true, now()->addMinutes(10));

        $authUrl = 'https://accounts.google.com/o/oauth2/v2/auth?'.http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'scope' => 'openid email profile',
            'access_type' => 'online',
            'prompt' => 'select_account',
            'state' => $state,
        ]);

        return response()->json([
            'success' => true,
            'url' => $authUrl,
        ]);
    }

    /**
     * Handle Google OAuth callback. Logs the user in via session and redirects
     * to the frontend callback URL. On error, redirects with `?error=<reason>`.
     *
     * @group Authentication
     */
    public function handleGoogleCallback(Request $request): RedirectResponse
    {
        $frontend = rtrim((string) config('app.frontend_url', env('FRONTEND_URL', 'http://localhost:3000')), '/');
        $callback = $frontend.'/auth/google/callback';

        if (! $request->has('code')) {
            return redirect()->away($callback.'?error=missing_code');
        }

        if (! $request->filled('state') || ! Cache::pull("oauth_state_{$request->state}")) {
            return redirect()->away($callback.'?error=invalid_state');
        }

        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Throwable $e) {
            return redirect()->away($callback.'?error=oauth_failed');
        }

        $nameParts = explode(' ', $googleUser->getName(), 2);

        // createOrFirst is atomic against the email unique constraint —
        // concurrent callbacks cannot create duplicate accounts.
        $user = User::createOrFirst(
            ['email' => $googleUser->getEmail()],
            [
                'first_name' => $nameParts[0] ?? 'User',
                'last_name' => $nameParts[1] ?? '',
                'password' => Hash::make(Str::random(24)),
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
                'email_verified_at' => now(),
            ]
        );

        // Refuse to re-link an account already bound to a different Google identity.
        if ($user->provider_id && $user->provider_id !== $googleUser->getId()) {
            return redirect()->away($callback.'?error=account_conflict');
        }

        // Link the social account (no-op for a freshly created user).
        $user->update([
            'provider' => 'google',
            'provider_id' => $googleUser->getId(),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->away($callback);
    }
}
