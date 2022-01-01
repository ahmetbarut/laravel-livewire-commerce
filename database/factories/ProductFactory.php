<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'discount' => $this->faker->numberBetween(0, 20),
            'price' => $this->faker->numberBetween(100, 100000),
            'user_id' => $this->faker->numberBetween(1, 10),
            'features' => $this->faker->text,
            'category_id' => $this->faker->numberBetween(1, 10),
            'slug' => $this->faker->slug,
        ];
    }
}
