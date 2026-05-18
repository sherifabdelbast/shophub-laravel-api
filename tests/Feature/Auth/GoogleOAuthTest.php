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

    public function test_callback_without_state_is_rejected(): void
    {
        $response = $this->getJson('/v1/auth/google/callback?code=some-code');

        $response->assertStatus(400)
            ->assertJson(['message' => 'Invalid or expired OAuth state']);
    }

    public function test_callback_with_invalid_state_is_rejected(): void
    {
        $response = $this->getJson('/v1/auth/google/callback?code=some-code&state=forged');

        $response->assertStatus(400)
            ->assertJson(['message' => 'Invalid or expired OAuth state']);
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

        $response = $this->getJson('/v1/auth/google/callback?code=some-code&state=validstate');

        $response->assertStatus(200)->assertJson(['success' => true]);

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
            $this->getJson("/v1/auth/google/callback?code=some-code&state={$state}")
                ->assertStatus(200);
        }

        $this->assertSame(1, User::where('email', 'repeat@example.com')->count());
    }
}
