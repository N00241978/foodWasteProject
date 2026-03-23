<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class DonationFactory extends Factory
{
    public function definition(): array
    {
        $user = User::inRandomOrder()->first()
            ?? User::factory()->create();

        $category = $this->faker->randomElement([
            'Food',
            'Clothes',
        ]);

        return [
            'user_id' => $user->id,

            'donation_category' => $category,

            'donation_description' => $category === 'Food'
                ? $this->faker->randomElement([
                    'Surplus canned food and non-perishable items available for donation.',
                    'Fresh food items donated to reduce waste.',
                    'Mixed food donation including dry goods and packaged items.',
                ])
                : $this->faker->randomElement([
                    'Gently used clothes available for donation.',
                    'Donation of jackets, shoes, and everyday clothing.',
                    'Second-hand clothing in good condition for redistribution.',
                ]),

            'quantity' => $this->faker->numberBetween(1, 20),

            'status' => $this->faker->randomElement([
                'pending',
                'collected',
                'cancelled',
                'completed',
            ]),
        ];
    }
}