<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use File;

class BusinessFactory extends Factory
{
    public function definition(): array
    {
        $owner = User::where('role', 'business')->inRandomOrder()->first()
            ?? User::factory()->create(['role' => 'business']);

        $image = $this->faker->randomElement(File::files(public_path('images\businesses')))->getFilename();

        return [
            'user_id' => $owner->id,

            'business_name' => $this->faker->company(),

            'business_type' => $this->faker->randomElement([
                'Cafe',
                'Restaurant',
                'Bakery',
                'Supermarket',
                'Takeaway',
            ]),

            'address' => $this->faker->streetAddress(),

            'city' => $this->faker->randomElement([
                'Dublin',
                'Cork',
                'Galway',
                'Limerick',
                'Waterford',
            ]),

            'eircode' => strtoupper($this->faker->bothify('A## ####')),

            'description' => $this->faker->sentence(12),

            'opening_hours' => 'Mon-Fri '
                . $this->faker->numberBetween(7, 10)
                . ':00 - '
                . $this->faker->numberBetween(16, 21)
                . ':00',

            'verified' => $this->faker->boolean(70),
            'image' => $image,
        ];
    }
}