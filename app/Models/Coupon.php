<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'type',
        'value',
        'min_purchase',
        'max_discount',
        'usage_limit',
        'used_count',
        'per_user_limit',
        'valid_from',
        'valid_to',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'value' => 'decimal:2',
            'min_purchase' => 'decimal:2',
            'max_discount' => 'decimal:2',
            'valid_from' => 'datetime',
            'valid_to' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    // Relationships
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function usage()
    {
        return $this->hasMany(CouponUsage::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('valid_from')
                    ->orWhere('valid_from', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('valid_to')
                    ->orWhere('valid_to', '>=', now());
            });
    }

    // Helper methods
    public function isValid()
    {
        if (! $this->is_active) {
            return false;
        }
        if ($this->valid_from && now()->lt($this->valid_from)) {
            return false;
        }
        if ($this->valid_to && now()->gt($this->valid_to)) {
            return false;
        }
        if ($this->usage_limit && $this->used_count >= $this->usage_limit) {
            return false;
        }

        return true;
    }

    public function canBeUsedBy($userId)
    {
        if (! $this->per_user_limit) {
            return true;
        }

        $userUsageCount = $this->usage()
            ->where('user_id', $userId)
            ->count();

        return $userUsageCount < $this->per_user_limit;
    }

    /**
     * Calculate the discount for a given subtotal.
     *
     * Money math uses bcmath at scale 2 to avoid float precision errors.
     */
    public function calculateDiscount(string $subtotal): string
    {
        if ($this->min_purchase && bccomp($subtotal, (string) $this->min_purchase, 2) < 0) {
            return '0.00';
        }

        $discount = '0.00';

        if ($this->type === 'percentage') {
            $discount = bcdiv(bcmul($subtotal, (string) $this->value, 4), '100', 2);
            if ($this->max_discount && bccomp($discount, (string) $this->max_discount, 2) > 0) {
                $discount = (string) $this->max_discount;
            }
        } elseif ($this->type === 'fixed') {
            $discount = (string) $this->value;
        }

        return bccomp($discount, $subtotal, 2) > 0 ? bcadd($subtotal, '0', 2) : bcadd($discount, '0', 2);
    }
}
