<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MassAssignmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_cannot_escalate_role_or_activation(): void
    {
        $response = $this->postJson('/v1/auth/register', [
            'first_name' => 'Mallory',
            'last_name' => 'Hacker',
            'email' => 'mallory@example.com',
            'password' => 'Password123',
            'gender' => 'female',
            'phone' => '12345678',
            'birthday' => '1990-01-01',
            'role' => 'admin',
            'is_active' => false,
        ]);

        $response->assertStatus(201);

        $user = User::where('email', 'mallory@example.com')->first();
        $this->assertSame('customer', $user->role);
        $this->assertTrue((bool) $user->is_active);
    }

    public function test_admin_can_set_role_when_creating_a_user(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->postJson('/v1/admin/users', [
            'first_name' => 'New',
            'last_name' => 'Admin',
            'email' => 'newadmin@example.com',
            'password' => 'Password123',
            'gender' => 'male',
            'phone' => '12345678',
            'birthday' => '1990-01-01',
            'role' => 'admin',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => 'newadmin@example.com',
            'role' => 'admin',
        ]);
    }

    public function test_admin_can_change_role_and_activation_via_update(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $target = User::factory()->create(['role' => 'customer', 'is_active' => true]);

        $response = $this->actingAs($admin)->putJson("/v1/admin/users/{$target->id}", [
            'role' => 'admin',
            'is_active' => false,
        ]);

        $response->assertStatus(200);
        $target->refresh();
        $this->assertSame('admin', $target->role);
        $this->assertFalse((bool) $target->is_active);
    }
}
