<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\SurplusListing;

class CartFactory extends Factory
{
    public function definition(): array
    {

        $user = User::where('role', 'customer')->inRandomOrder()->first()
            ?? User::factory()->create(['role' => 'customer']);


        $listing = SurplusListing::inRandomOrder()->first()
            ?? SurplusListing::factory()->create();

        $quantity = $this->faker->numberBetween(1, 3);

        return [
            'user_id' => $user->id,

            'listing_id' => $listing->id,

            'quantity' => $quantity,

            'total_price' => ($listing->discounted_price ?? $this->faker->randomFloat(2, 3, 15)) * $quantity,

            'order_status' => $this->faker->randomElement([
                'completed',
                'completed',
                'completed',
                'pending',
                'cancelled'
            ]),
        ];
    }
}