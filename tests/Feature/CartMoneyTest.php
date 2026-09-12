<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartMoneyTest extends TestCase
{
    use RefreshDatabase;

    public function test_cart_item_subtotal_is_an_exact_two_decimal_string(): void
    {
        // 0.10 * 3 = 0.30 exactly — float math would yield 0.30000000000000004.
        $item = new CartItem(['price' => '0.10', 'quantity' => 3]);

        $this->assertSame('0.30', $item->subtotal());
    }

    public function test_cart_subtotal_sums_without_float_drift(): void
    {
        Category::factory()->create();
        Brand::factory()->create();
        $user = User::factory()->create();

        // Three distinct products at 0.10 each — cart_items is unique per
        // (user_id, product_id), so one row per product.
        foreach (range(1, 3) as $ignored) {
            $product = Product::factory()->create(['price' => '0.10', 'discount_price' => null]);
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => '0.10',
            ]);
        }

        $cart = app(CartService::class)->getCart($user);

        $this->assertSame('0.30', $cart['subtotal']);
    }

    public function test_profit_margin_uses_precise_subtraction(): void
    {
        $product = new Product(['price' => '10.10', 'cost_price' => '3.30', 'discount_price' => null]);

        $this->assertSame('6.80', $product->profitMargin());
    }

    public function test_profit_margin_handles_zero_cost_price(): void
    {
        $product = new Product(['price' => '10.00', 'cost_price' => '0', 'discount_price' => null]);

        $this->assertSame('10.00', $product->profitMargin());
    }

    public function test_profit_margin_is_null_when_cost_price_missing(): void
    {
        $product = new Product(['price' => '10.00', 'cost_price' => null, 'discount_price' => null]);

        $this->assertNull($product->profitMargin());
    }
}
