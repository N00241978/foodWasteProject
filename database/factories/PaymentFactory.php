<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        $order = Order::inRandomOrder()->first()
            ?? Order::factory()->create();

        $status = $this->faker->randomElement([
            'paid',
            'paid',
            'pending',
            'failed',
            'refunded',
        ]);

        return [
            'order_id' => $order->id,

            'amount' => $order->total_price,

            'payment_method' => $this->faker->randomElement([
                'card',
                'paypal',
                'apple_pay',
                'google_pay',
            ]),

            'payment_status' => $status,

            'transaction_ref' => strtoupper($this->faker->bothify('TXN-########??')),

            'paid_at' => $status === 'paid'
                ? now()->subDays(rand(0, 7))
                : now(),
        ];
    }
}