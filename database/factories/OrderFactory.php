<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => 'ORD-'.strtoupper(Str::random(10)),
            'user_id' => User::factory(),
            'status' => 'pending',
            'payment_status' => 'unpaid',
            'subtotal' => '100.00',
            'tax' => '10.00',
            'shipping_cost' => '0.00',
            'discount' => '0.00',
            'total' => '110.00',
            'shipping_address' => ['line1' => $this->faker->streetAddress()],
            'billing_address' => null,
        ];
    }
}
