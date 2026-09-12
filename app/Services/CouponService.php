<?php

namespace App\Services;

use App\Models\Coupon;

class CouponService
{
    /**
     * Validate if coupon can be used by user.
     */
    public function isValidForUser(Coupon $coupon, int $userId, string $subtotal): bool
    {
        if (! $coupon->isValid()) {
            return false;
        }

        if (! $coupon->canBeUsedBy($userId)) {
            return false;
        }

        if ($coupon->min_purchase && bccomp($subtotal, (string) $coupon->min_purchase, 2) < 0) {
            return false;
        }

        return true;
    }

    /**
     * Validate coupon code.
     */
    public function validateCoupon(string $code, int $userId, string $subtotal): array
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
