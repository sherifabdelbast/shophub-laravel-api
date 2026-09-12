<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Facades\Socialite;
use Mockery;
use Tests\TestCase;

class GoogleOAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_callback_without_state_redirects_with_error(): void
    {
        $response = $this->get('/v1/auth/google/callback?code=some-code');

        $response->assertRedirect();
        $this->assertStringContainsString('error=invalid_state', $response->headers->get('Location'));
    }

    public function test_callback_with_invalid_state_redirects_with_error(): void
    {
        $response = $this->get('/v1/auth/google/callback?code=some-code&state=forged');

        $response->assertRedirect();
        $this->assertStringContainsString('error=invalid_state', $response->headers->get('Location'));
    }

    public function test_callback_without_code_redirects_with_error(): void
    {
        $response = $this->get('/v1/auth/google/callback');

        $response->assertRedirect();
        $this->assertStringContainsString('error=missing_code', $response->headers->get('Location'));
    }

    public function test_new_oauth_user_is_created_without_fabricated_data(): void
    {
        Cache::put('oauth_state_validstate', true, now()->addMinutes(10));

        $socialiteUser = Mockery::mock(\Laravel\Socialite\Contracts\User::class);
        $socialiteUser->shouldReceive('getEmail')->andReturn('jane@example.com');
        $socialiteUser->shouldReceive('getName')->andReturn('Jane Doe');
        $socialiteUser->shouldReceive('getId')->andReturn('google-123');

        $provider = Mockery::mock(Provider::class);
        $provider->shouldReceive('stateless')->andReturnSelf();
        $provider->shouldReceive('user')->andReturn($socialiteUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $response = $this->get('/v1/auth/google/callback?code=some-code&state=validstate');

        $response->assertRedirect();
        $this->assertStringNotContainsString('error=', $response->headers->get('Location'));

        $user = User::where('email', 'jane@example.com')->first();
        $this->assertNotNull($user);
        $this->assertNull($user->gender);
        $this->assertNull($user->birthday);
        $this->assertNull($user->phone);
    }

    public function test_repeated_oauth_callback_does_not_duplicate_the_account(): void
    {
        $socialiteUser = Mockery::mock(\Laravel\Socialite\Contracts\User::class);
        $socialiteUser->shouldReceive('getEmail')->andReturn('repeat@example.com');
        $socialiteUser->shouldReceive('getName')->andReturn('Repeat User');
        $socialiteUser->shouldReceive('getId')->andReturn('google-repeat');

        $provider = Mockery::mock(Provider::class);
        $provider->shouldReceive('stateless')->andReturnSelf();
        $provider->shouldReceive('user')->andReturn($socialiteUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        foreach (['stateone', 'statetwo'] as $state) {
            Cache::put("oauth_state_{$state}", true, now()->addMinutes(10));
            $response = $this->get("/v1/auth/google/callback?code=some-code&state={$state}");
            $response->assertRedirect();
            $this->assertStringNotContainsString('error=', $response->headers->get('Location'));
        }

        $this->assertSame(1, User::where('email', 'repeat@example.com')->count());
    }

    public function test_callback_refuses_to_link_existing_local_account(): void
    {
        // Pre-existing local user with the same email, no provider linked.
        $existing = User::factory()->create([
            'email' => 'victim@example.com',
            'provider' => null,
            'provider_id' => null,
        ]);

        Cache::put('oauth_state_validstate', true, now()->addMinutes(10));

        $socialiteUser = Mockery::mock(\Laravel\Socialite\Contracts\User::class);
        $socialiteUser->shouldReceive('getEmail')->andReturn('victim@example.com');
        $socialiteUser->shouldReceive('getName')->andReturn('Attacker Name');
        $socialiteUser->shouldReceive('getId')->andReturn('attacker-google-id');

        $provider = Mockery::mock(Provider::class);
        $provider->shouldReceive('stateless')->andReturnSelf();
        $provider->shouldReceive('user')->andReturn($socialiteUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $response = $this->get('/v1/auth/google/callback?code=some-code&state=validstate');

        $response->assertRedirect();
        $this->assertStringContainsString('error=account_exists', $response->headers->get('Location'));

        // Critical: user is NOT logged in.
        $this->assertGuest();

        // Critical: existing user record is unchanged.
        $existing->refresh();
        $this->assertNull($existing->provider);
        $this->assertNull($existing->provider_id);
    }

    public function test_callback_logs_in_existing_google_linked_user(): void
    {
        $existing = User::factory()->create([
            'email' => 'returning@example.com',
            'provider' => 'google',
            'provider_id' => 'google-returning-id',
        ]);

        Cache::put('oauth_state_validstate', true, now()->addMinutes(10));

        $socialiteUser = Mockery::mock(\Laravel\Socialite\Contracts\User::class);
        $socialiteUser->shouldReceive('getEmail')->andReturn('returning@example.com');
        $socialiteUser->shouldReceive('getName')->andReturn('Returning User');
        $socialiteUser->shouldReceive('getId')->andReturn('google-returning-id');

        $provider = Mockery::mock(Provider::class);
        $provider->shouldReceive('stateless')->andReturnSelf();
        $provider->shouldReceive('user')->andReturn($socialiteUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $response = $this->get('/v1/auth/google/callback?code=some-code&state=validstate');

        $response->assertRedirect();
        $this->assertStringNotContainsString('error=', $response->headers->get('Location'));

        // No new user created.
        $this->assertSame(1, User::where('email', 'returning@example.com')->count());

        // Logged in as the returning user.
        $this->assertAuthenticatedAs($existing->fresh());
    }
}
