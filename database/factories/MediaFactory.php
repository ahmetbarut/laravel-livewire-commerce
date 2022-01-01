<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 100),
            'path' => $this->faker->imageUrl(),
            'type' => $this->faker->randomElement(['image']),
            'slug' => $this->faker->slug(),
        ];
    }
}
