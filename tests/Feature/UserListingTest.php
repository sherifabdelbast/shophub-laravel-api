<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_user_index_is_paginated(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        User::factory()->count(20)->create();

        $response = $this->actingAs($admin)->getJson('/v1/admin/users');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data',
                'meta' => ['current_page', 'last_page', 'per_page', 'total'],
            ])
            ->assertJsonPath('meta.total', 21);

        $this->assertLessThanOrEqual(15, count($response->json('data')));
    }

    public function test_user_index_does_not_leak_sensitive_fields(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->getJson('/v1/admin/users');

        $response->assertStatus(200);
        foreach ($response->json('data') as $user) {
            $this->assertArrayNotHasKey('password', $user);
            $this->assertArrayNotHasKey('role', $user);
            $this->assertArrayNotHasKey('is_active', $user);
            $this->assertArrayNotHasKey('provider_id', $user);
            $this->assertArrayNotHasKey('remember_token', $user);
        }
    }

    public function test_show_does_not_leak_sensitive_fields(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $target = User::factory()->create(['role' => 'customer']);

        $response = $this->actingAs($admin)->getJson("/v1/admin/users/{$target->id}");

        $response->assertStatus(200);
        $data = $response->json('data');
        $this->assertArrayNotHasKey('password', $data);
        $this->assertArrayNotHasKey('role', $data);
        $this->assertArrayNotHasKey('is_active', $data);
        $this->assertArrayNotHasKey('provider_id', $data);
    }

    public function test_non_admin_cannot_list_users(): void
    {
        $user = User::factory()->create(['role' => 'customer']);

        $response = $this->actingAs($user)->getJson('/v1/admin/users');

        $response->assertStatus(403);
    }
}
