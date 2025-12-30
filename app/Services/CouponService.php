<?php

namespace App\Services;

use App\Models\Coupon;

class CouponService
{
    /**
     * Validate if coupon can be used by user.
     */
    public function isValidForUser(Coupon $coupon, int $userId, float $subtotal): bool
    {
        if (! $coupon->isValid()) {
            return false;
        }

        if (! $coupon->canBeUsedBy($userId)) {
            return false;
        }

        if ($coupon->min_purchase && $subtotal < $coupon->min_purchase) {
            return false;
        }

        return true;
    }

    /**
     * Validate coupon code.
     */
    public function validateCoupon(string $code, int $userId, float $subtotal): array
    {
        $coupon = Coupon::where('code', $code)->first();

        if (! $coupon) {
            return [
                'valid' => false,
                'message' => 'Invalid coupon code',
            ];
        }

        if (! $this->isValidForUser($coupon, $userId, $subtotal)) {
            return [
                'valid' => false,
                'message' => 'Coupon is not valid or cannot be used',
            ];
        }

        $discount = $coupon->calculateDiscount($subtotal);

        return [
            'valid' => true,
            'coupon' => $coupon,
            'discount' => $discount,
            'message' => 'Coupon applied successfully',
        ];
    }
}
