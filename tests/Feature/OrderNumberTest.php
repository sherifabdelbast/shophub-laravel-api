<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderNumberTest extends TestCase
{
    use RefreshDatabase;

    public function test_each_order_gets_a_distinct_well_formed_order_number(): void
    {
        Category::factory()->create();
        Brand::factory()->create();
        $user = User::factory()->create();
        $service = app(OrderService::class);

        $numbers = [];
        foreach (range(1, 5) as $ignored) {
            $product = Product::factory()->create(['stock' => 10]);
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);

            $order = $service->createOrderFromCart($user, ['line1' => 'Somewhere']);

            $this->assertMatchesRegularExpression('/^ORD-[A-Z0-9]{16}$/', $order->order_number);
            $numbers[] = $order->order_number;
        }

        $this->assertSame($numbers, array_unique($numbers));
    }
}
