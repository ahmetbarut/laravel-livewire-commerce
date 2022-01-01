<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => rand(1, 100),
            'user_id' => rand(1, 16),
            'comment' => $this->faker->text,
            'rating' => rand(1, 5),
        ];
    }
}
