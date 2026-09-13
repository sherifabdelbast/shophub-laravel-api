<?php

namespace Tests\Feature;

use Tests\TestCase;

class CorsTest extends TestCase
{
    private function preflight(string $origin): \Illuminate\Testing\TestResponse
    {
        return $this->call('OPTIONS', '/v1/products', [], [], [], [
            'HTTP_ORIGIN' => $origin,
            'HTTP_ACCESS_CONTROL_REQUEST_METHOD' => 'GET',
        ]);
    }

    public function test_allowed_origin_receives_cors_headers(): void
    {
        $response = $this->preflight('http://localhost:3000');

        $response->assertHeader('Access-Control-Allow-Origin', 'http://localhost:3000');
        $response->assertHeader('Access-Control-Max-Age', '86400');
    }

    public function test_disallowed_origin_is_not_granted_access(): void
    {
        $response = $this->preflight('http://evil.example.com');

        $response->assertHeaderMissing('Access-Control-Allow-Origin');
    }
}
