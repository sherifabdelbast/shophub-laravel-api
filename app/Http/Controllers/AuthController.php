<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password; // ← صحح هذا السطر
use Illuminate\Auth\Events\PasswordReset; 
use Illuminate\Support\Facades\Log; // ← أضف هذا للسجلات

class AuthController extends Controller
{

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
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
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
    public function redirectToGoogle()
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
    public function handleGoogleCallback(Request $request)
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
                $user = User::create([
                    'name' => $googleUser->getName(),
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

//   public function forgotPassword(Request $request)
//     {
//         try {
//             $validator = Validator::make($request->all(), [
//                 'email' => 'required|email|exists:users,email',
//             ]);

//             if ($validator->fails()) {
//                 return response()->json([
//                     'success' => false,
//                     'message' => 'Validation error',
//                     'errors' => $validator->errors()
//                 ], 422);
//             }

//             $status = Password::sendResetLink(
//                 $request->only('email')
//             );

//             \Log::info('Password reset link sent', [
//                 'email' => $request->email,
//                 'status' => $status
//             ]);

//             if ($status === Password::RESET_LINK_SENT) {
//                 return response()->json([
//                     'success' => true,
//                     'message' => 'Password reset link has been sent to your email'
//                 ]);
//             }

//             return response()->json([
//                 'success' => false,
//                 'message' => 'Unable to send reset link. Please try again.'
//             ], 400);

//         } catch (\Exception $e) {
//             \Log::error('Forgot password error: ' . $e->getMessage());
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Failed to send reset link',
//                 'error' => $e->getMessage()
//             ], 500);
//         }
//     }

//     /**
//      * Reset password
//      */
//     public function resetPassword(Request $request)
//     {
//         try {
//             $validator = Validator::make($request->all(), [
//                 'token' => 'required',
//                 'email' => 'required|email|exists:users,email',
//                 'password' => 'required|string|min:6|confirmed',
//             ], [
//                 'password.confirmed' => 'Password confirmation does not match.',
//                 'email.exists' => 'No account found with this email address.'
//             ]);

//             if ($validator->fails()) {
//                 return response()->json([
//                     'success' => false,
//                     'message' => 'Validation error',
//                     'errors' => $validator->errors()
//                 ], 422);
//             }

//             $status = Password::reset(
//                 $request->only('email', 'password', 'password_confirmation', 'token'),
//                 function ($user, $password) {
//                     $user->forceFill([
//                         'password' => Hash::make($password)
//                     ])->setRememberToken(Str::random(60));

//                     $user->save();

//                     event(new PasswordReset($user));
                    
//                     \Log::info('Password reset successful', ['user_id' => $user->id]);
//                 }
//             );

//             if ($status === Password::PASSWORD_RESET) {
//                 return response()->json([
//                     'success' => true,
//                     'message' => 'Password has been reset successfully'
//                 ]);
//             }

//             return response()->json([
//                 'success' => false,
//                 'message' => 'Invalid or expired reset token'
//             ], 400);

//         } catch (\Exception $e) {
//             \Log::error('Reset password error: ' . $e->getMessage());
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Failed to reset password',
//                 'error' => $e->getMessage()
//             ], 500);
//         }
//     }
}

