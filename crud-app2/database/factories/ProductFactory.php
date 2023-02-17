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
        $faker = \Faker\Factory::create();
        return [
            "name" => $faker->word,
            "price" => $faker->numberBetween(100, 999999) / 100,
            "description" => $faker->text,
            "item_number" => $faker->numberBetween(1, 9999),
            "image" => $faker->imageUrl
        ];
    }
}
