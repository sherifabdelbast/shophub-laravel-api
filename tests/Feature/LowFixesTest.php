<?php

namespace Tests\Feature;

use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LowFixesTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_coupon_cannot_be_recorded_twice_for_one_order(): void
    {
        $coupon = Coupon::factory()->create();
        $order = Order::factory()->create();

        CouponUsage::create([
            'coupon_id' => $coupon->id,
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'discount_amount' => '5.00',
        ]);

        $this->expectException(QueryException::class);

        CouponUsage::create([
            'coupon_id' => $coupon->id,
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'discount_amount' => '5.00',
        ]);
    }

    public function test_model_relationships_declare_their_return_types(): void
    {
        $this->assertInstanceOf(HasMany::class, (new User)->orders());
        $this->assertInstanceOf(BelongsTo::class, (new Order)->user());
        $this->assertInstanceOf(HasMany::class, (new Product)->reviews());
        $this->assertInstanceOf(BelongsTo::class, (new CouponUsage)->coupon());
    }
}
