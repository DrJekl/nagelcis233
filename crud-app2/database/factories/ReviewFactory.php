<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Product;

use Database\Seeders\UserSeeder;
use Database\Seeders\ProductSeeder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $firstId = Product::first()->id;
        $firstUser = User::first()->id;
        return [
            "comment" => $faker->text,
            "rating" => $faker->numberBetween(1, 5),
            "product_id" => $faker->numberBetween($firstId, $firstId + ProductSeeder::QUANTITY - 1),
            "user_id" => $faker->numberBetween($firstUser, $firstUser + UserSeeder::QUANTITY - 1)
        ];
    }
}
