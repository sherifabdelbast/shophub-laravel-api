<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_users_can_register(): void
    {
        $response = $this->postJson('/v1/auth/register', [
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'gender' => 'male',
            'phone' => '1234567890',
            'birthday' => '1990-01-01',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'token',
                'user',
                'message',
            ])
            ->assertJson(['success' => true]);

        $this->assertNotNull($response->json('token'));
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);
    }
}
