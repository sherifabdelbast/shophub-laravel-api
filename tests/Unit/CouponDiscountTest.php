<?php

namespace Tests\Unit;

use App\Models\Coupon;
use Tests\TestCase;

class CouponDiscountTest extends TestCase
{
    public function test_percentage_discount_is_calculated_with_two_decimals(): void
    {
        $coupon = new Coupon(['type' => 'percentage', 'value' => 10]);

        $this->assertSame('33.33', $coupon->calculateDiscount('333.33'));
    }

    public function test_percentage_discount_is_capped_by_max_discount(): void
    {
        $coupon = new Coupon(['type' => 'percentage', 'value' => 50, 'max_discount' => 20]);

        $this->assertSame('20.00', $coupon->calculateDiscount('100.00'));
    }

    public function test_fixed_discount_returns_the_coupon_value(): void
    {
        $coupon = new Coupon(['type' => 'fixed', 'value' => 15]);

        $this->assertSame('15.00', $coupon->calculateDiscount('100.00'));
    }

    public function test_discount_never_exceeds_the_subtotal(): void
    {
        $coupon = new Coupon(['type' => 'fixed', 'value' => 500]);

        $this->assertSame('40.00', $coupon->calculateDiscount('40.00'));
    }

    public function test_no_discount_below_min_purchase(): void
    {
        $coupon = new Coupon(['type' => 'percentage', 'value' => 10, 'min_purchase' => 100]);

        $this->assertSame('0.00', $coupon->calculateDiscount('99.99'));
    }

    public function test_free_shipping_type_yields_zero_discount(): void
    {
        $coupon = new Coupon(['type' => 'free_shipping', 'value' => 0]);

        $this->assertSame('0.00', $coupon->calculateDiscount('100.00'));
    }
}
