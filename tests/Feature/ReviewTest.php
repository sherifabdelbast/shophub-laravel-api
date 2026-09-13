<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    private function makeProduct(): Product
    {
        Category::factory()->create();
        Brand::factory()->create();

        return Product::factory()->create();
    }

    public function test_user_can_submit_a_review(): void
    {
        $user = $this->actingAs(User::factory()->create());
        $product = $this->makeProduct();

        $response = $user->postJson('/v1/reviews', [
            'product_id' => $product->id,
            'rating' => 5,
            'comment' => 'Great product',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseCount('reviews', 1);
    }

    public function test_user_cannot_review_the_same_product_twice(): void
    {
        $user = User::factory()->create();
        $product = $this->makeProduct();
        Review::factory()->create(['user_id' => $user->id, 'product_id' => $product->id]);

        $response = $this->actingAs($user)->postJson('/v1/reviews', [
            'product_id' => $product->id,
            'rating' => 4,
            'comment' => 'Trying again',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('product_id');
        $this->assertDatabaseCount('reviews', 1);
    }

    public function test_marking_a_review_helpful_is_idempotent(): void
    {
        $product = $this->makeProduct();
        $review = Review::factory()->create(['product_id' => $product->id]);
        $voter = User::factory()->create();

        $first = $this->actingAs($voter)->postJson("/v1/reviews/{$review->id}/helpful");
        $first->assertStatus(200)->assertJsonPath('data.helpful_count', 1);

        $second = $this->actingAs($voter)->postJson("/v1/reviews/{$review->id}/helpful");
        $second->assertStatus(200)->assertJsonPath('data.helpful_count', 1);

        $this->assertSame(1, $review->fresh()->helpful_count);
        $this->assertDatabaseCount('review_helpful_votes', 1);
    }

    public function test_distinct_users_each_count_once(): void
    {
        $product = $this->makeProduct();
        $review = Review::factory()->create(['product_id' => $product->id]);

        foreach (User::factory()->count(3)->create() as $voter) {
            $this->actingAs($voter)->postJson("/v1/reviews/{$review->id}/helpful")
                ->assertStatus(200);
        }

        $this->assertSame(3, $review->fresh()->helpful_count);
        $this->assertDatabaseCount('review_helpful_votes', 3);
    }
}
