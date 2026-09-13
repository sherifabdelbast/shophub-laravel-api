<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderCancellationTest extends TestCase
{
    use RefreshDatabase;

    public function test_cancelling_an_order_restores_stock_coupon_and_status(): void
    {
        Category::factory()->create();
        Brand::factory()->create();
        $product = Product::factory()->create([
            'stock' => 3,
            'low_stock_threshold' => 10,
            'stock_status' => 'in_stock',
        ]);
        $coupon = Coupon::factory()->percentage(10)->create([
            'code' => 'SAVE10',
            'usage_limit' => 5,
            'used_count' => 0,
        ]);
        $user = User::factory()->create();
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 3,
            'price' => $product->price,
        ]);

        $service = app(OrderService::class);
        $order = $service->createOrderFromCart($user, ['line1' => 'Somewhere'], null, 'SAVE10');

        // Order creation consumed all stock and one coupon use.
        $this->assertSame(0, $product->fresh()->stock);
        $this->assertSame(1, $coupon->fresh()->used_count);
        $this->assertDatabaseHas('coupon_usage', ['order_id' => $order->id]);

        $service->cancelOrder($order->fresh(), $user);

        $product->refresh();
        $this->assertSame(3, $product->stock);
        // 3 restored, threshold 10 -> low_stock, not in_stock.
        $this->assertSame('low_stock', $product->stock_status);

        // Coupon slot released.
        $this->assertSame(0, $coupon->fresh()->used_count);
        $this->assertDatabaseMissing('coupon_usage', ['order_id' => $order->id]);
    }

    public function test_an_order_cannot_be_cancelled_twice(): void
    {
        $user = User::factory()->create();
        $order = \App\Models\Order::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        $service = app(OrderService::class);
        $service->cancelOrder($order->fresh(), $user);

        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('cannot be cancelled');
        $service->cancelOrder($order->fresh(), $user);
    }
}
