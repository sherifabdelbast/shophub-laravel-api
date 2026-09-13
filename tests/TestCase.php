<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Treat all test requests as coming from the configured SPA frontend so
        // that Sanctum's EnsureFrontendRequestsAreStateful attaches the session
        // middleware (mirrors how the Next.js frontend hits the API).
        $this->withHeaders(['Origin' => 'http://localhost']);
    }
}
