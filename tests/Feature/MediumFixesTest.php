<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MediumFixesTest extends TestCase
{
    use RefreshDatabase;

    private function shippingAddress(): array
    {
        return [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'phone' => '12345678',
            'street_line_1' => '1 Main St',
            'city' => 'Town',
            'state_province' => 'State',
            'postal_code' => '12345',
            'country' => 'US',
        ];
    }

    public function test_billing_address_must_be_fully_formed_when_present(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/v1/orders', [
            'shipping_address' => $this->shippingAddress(),
            'billing_address' => ['first_name' => 'Jane'], // missing the rest
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('billing_address.country');
    }

    public function test_brand_logo_url_must_be_a_valid_url(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $brand = Brand::factory()->create();

        $response = $this->actingAs($admin)->putJson("/v1/admin/brands/{$brand->id}", [
            'name' => $brand->name,
            'logo_url' => 'javascript:alert(1)',
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors('logo_url');
    }

    public function test_product_rating_cannot_be_set_by_the_client(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Category::factory()->create();
        Brand::factory()->create();
        $product = Product::factory()->create(['rating' => 4.5]);

        $response = $this->actingAs($admin)->putJson("/v1/admin/products/{$product->slug}", [
            'name' => $product->name,
            'rating' => 1,
        ]);

        $response->assertStatus(200);
        $this->assertSame('4.50', (string) $product->fresh()->rating);
    }

    public function test_approving_reviews_recalculates_product_rating(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Category::factory()->create();
        Brand::factory()->create();
        $product = Product::factory()->create();

        $reviewA = Review::factory()->create([
            'product_id' => $product->id,
            'rating' => 4,
            'status' => 'pending',
        ]);
        $reviewB = Review::factory()->create([
            'product_id' => $product->id,
            'rating' => 2,
            'status' => 'pending',
        ]);

        $this->actingAs($admin)->patchJson("/v1/admin/reviews/{$reviewA->id}/approve")->assertStatus(200);
        $this->actingAs($admin)->patchJson("/v1/admin/reviews/{$reviewB->id}/approve")->assertStatus(200);

        $product->refresh();
        $this->assertSame('3.00', (string) $product->rating);
        $this->assertSame(2, $product->reviews_count);
    }

    public function test_review_rating_is_cast_to_an_integer(): void
    {
        Category::factory()->create();
        Brand::factory()->create();
        $review = Review::factory()->create(['rating' => 5]);

        $this->assertSame(5, $review->fresh()->rating);
    }
}
