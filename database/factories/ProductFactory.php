<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 999),
            'isPublished' => $this->faker->boolean(),
            'isPromoted' => $this->faker->boolean(),
            'productRef' => $this->faker->regexify('[A-Za-z0-9]{16}'),
            'created_at' => $this->faker->dateTime()
        ];
    }
}
