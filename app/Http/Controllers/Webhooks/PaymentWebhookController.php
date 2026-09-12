<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentWebhookController extends Controller
{
    /**
     * Receive a webhook from a payment gateway. Each provider has its own
     * signature scheme — verification is delegated to a per-provider handler
     * once one is wired up. Until then, the endpoint accepts and logs.
     */
    public function handle(Request $request, string $provider): JsonResponse
    {
        if (! $this->verifySignature($request, $provider)) {
            Log::warning('Payment webhook signature verification failed', [
                'provider' => $provider,
                'ip' => $request->ip(),
            ]);

            return response()->json(['success' => false, 'message' => 'Invalid signature'], 401);
        }

        Log::info('Payment webhook received', [
            'provider' => $provider,
            'event' => Str::limit((string) $request->input('type', 'unknown'), 64),
        ]);

        // TODO: dispatch to per-provider handler (Stripe, Paymob, etc.) once wired.

        return response()->json(['success' => true]);
    }

    private function verifySignature(Request $request, string $provider): bool
    {
        $secret = config("payment.webhook_secrets.{$provider}");

        if ($secret === null) {
            return false;
        }

        $signature = $request->header('X-Webhook-Signature');

        if ($signature === null) {
            return false;
        }

        $expected = hash_hmac('sha256', $request->getContent(), $secret);

        return hash_equals($expected, $signature);
    }
}
