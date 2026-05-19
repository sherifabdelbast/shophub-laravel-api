<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        apiPrefix: 'v1', // API versioning: /v1/*
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Token-based API (Bearer). No SPA cookie/session middleware needed.
        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Always render API (/v1/*) errors as JSON, never as an HTML page.
        $exceptions->shouldRenderJsonWhen(
            fn ($request, $e) => $request->is('v1/*') || $request->expectsJson()
        );

        // Uniform JSON envelope for API errors. Internal details never leak to clients;
        // they go to the log with request context for debugging.
        $exceptions->render(function (\Throwable $e, $request) {
            if (! ($request->is('v1/*') || $request->expectsJson())) {
                return null;
            }

            if ($e instanceof \Illuminate\Validation\ValidationException) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $e->errors(),
                ], 422);
            }

            if ($e instanceof \Illuminate\Auth\AuthenticationException) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated',
                ], 401);
            }

            if ($e instanceof \Illuminate\Auth\Access\AuthorizationException) {
                return response()->json([
                    'success' => false,
                    'message' => 'Forbidden',
                ], 403);
            }

            if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
                || $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json([
                    'success' => false,
                    'message' => 'Resource not found',
                ], 404);
            }

            if ($e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
                return response()->json([
                    'success' => false,
                    'message' => 'Method not allowed',
                ], 405);
            }

            if ($e instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException) {
                return response()->json([
                    'success' => false,
                    'message' => 'Too many requests',
                ], 429);
            }

            if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage() ?: 'Request failed',
                ], $e->getStatusCode());
            }

            \Illuminate\Support\Facades\Log::error('Unhandled API exception', [
                'exception' => get_class($e),
                'message' => $e->getMessage(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'user_id' => optional($request->user())->id,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Server error',
            ], 500);
        });
    })->create();
