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
    public function definition(): array
    {
        return [
            //
            'ar_name' => $this->faker->name(),
            'en_name' => $this->faker->name(),
            'ar_description' => $this->faker->text(),
            'en_description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(100, 10000),
            'category_id' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->image()
        ];
    }
}
