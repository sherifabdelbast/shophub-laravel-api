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
            'password' => 'Password123',
            'gender' => 'male',
            'phone' => '1234567890',
            'birthday' => '1990-01-01',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'user',
                'message',
            ])
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'first_name' => 'Test',
            'last_name' => 'User',
        ]);
    }

    public function test_registration_rejects_weak_passwords(): void
    {
        $weakPasswords = [
            'short1A',        // too short
            'alllowercase1',  // no uppercase
            'ALLUPPERCASE1',  // no lowercase
            'NoDigitsHere',   // no numbers
        ];

        foreach ($weakPasswords as $weak) {
            $response = $this->postJson('/v1/auth/register', [
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'weak'.uniqid().'@example.com',
                'phone' => '1234567'.random_int(100, 999),
                'gender' => 'male',
                'birthday' => '1990-01-01',
                'password' => $weak,
            ]);

            $response->assertStatus(422)
                ->assertJsonValidationErrors('password');
        }
    }
}
