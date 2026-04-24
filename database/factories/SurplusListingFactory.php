<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Business;

class SurplusListingFactory extends Factory
{
    public function definition(): array
    {
        $business = Business::inRandomOrder()->first()
            ?? Business::factory()->create();

        $originalPrice = $this->faker->randomFloat(2, 8, 25);
        $discountedPrice = $this->faker->randomFloat(2, 3, $originalPrice - 1);

        $pickupStart = now()->addHours($this->faker->numberBetween(1, 6));
        $pickupEnd = (clone $pickupStart)->addHours($this->faker->numberBetween(1, 3));

        return [
            'business_id' => $business->id,

            'title' => $this->faker->randomElement([
                'Surprise Bag',
                'Fresh Pastry Box',
                'Ready Meal',
                'Bakery Box',
                'Lunch Bundle',
                'Mixed Food Pack',
                'Sandwich Bundle',
                'Fruit and Veg Box',
                'Canned Meats',
                'Lard',
                'Suspicious Tuna',
            ]),

            'description' => $this->faker->sentence(12),

            'original_price' => $originalPrice,

            'discounted_price' => $discountedPrice,

            'quantity_available' => $this->faker->numberBetween(1, 10),

            'pickup_start' => $pickupStart,
            'pickup_end' => $pickupEnd,

            'status' => $this->faker->randomElement([
                'available',
                'available',
                'reserved',
                'collected',
            ]),
        ];
    }
}