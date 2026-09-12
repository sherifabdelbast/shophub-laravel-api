<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Coupon>
 */
class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper($this->faker->unique()->bothify('SAVE####')),
            'description' => $this->faker->sentence(),
            'type' => 'percentage',
            'value' => 10,
            'min_purchase' => null,
            'max_discount' => null,
            'usage_limit' => null,
            'used_count' => 0,
            'per_user_limit' => null,
            'valid_from' => null,
            'valid_to' => null,
            'is_active' => true,
        ];
    }

    public function fixed(float $value): static
    {
        return $this->state(fn () => ['type' => 'fixed', 'value' => $value]);
    }

    public function percentage(float $value): static
    {
        return $this->state(fn () => ['type' => 'percentage', 'value' => $value]);
    }
}
