<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    const QUANTITY = 35;
    public function run(): void
    {
        // $products = Product::pluck("id");
        // foreach($products as $product) {
        //        Review::factory()
        //             ->count(rand(1, 3))
        //             ->create(["product_id"=>$product]);
        // }
        // Review::query()->delete();
        Review::factory()
                    ->count(self::QUANTITY)
                    ->create();
    }
}
