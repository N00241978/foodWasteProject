<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Business;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        $user = User::where('role', 'customer')->inRandomOrder()->first()
            ?? User::factory()->create(['role' => 'customer']);

        $business = Business::inRandomOrder()->first()
            ?? Business::factory()->create();

        $rating = $this->faker->numberBetween(1, 5);

        $goodComment = $this->faker->randomElement([
            'Great value and very easy pickup.',
            'Food was fresh and the staff were friendly.',
            'Really good experience, would order again.',
            'Nice idea and helped reduce waste.',
            'Quick collection and generous portion size.',
            'Everything went smoothly and the food was lovely.',
            'Very convenient and affordable.',
            'Good service and a great sustainability initiative.',
            'What a great app!!! So easy to use!!!'
        ]);

        $badComment = $this->faker->randomElement([
            'SUCKS!! WILL NEVER RETURN!! YOU JUST LOST A CUSTOMER!!!!',
            'Rude staff, one guy told me my face is "oddly long" when I collected my order.',
            'Large bubble of spit in my food, didnt affected the flavour though',
            'L food, im going to mcdonalds!',
            'tastes like buns bruh'
        ]);

        if ($rating >= 3) {
            $comment = $goodComment;
        } else {
            $comment = $badComment;
        }

        return [
            'user_id' => $user->id,
            'business_id' => $business->id,

            'rating' => $rating,

            'comment' => $comment,

            'created_at' => now()->subDays(rand(0, 14)),
            'updated_at' => now(),
        ];
    }
}