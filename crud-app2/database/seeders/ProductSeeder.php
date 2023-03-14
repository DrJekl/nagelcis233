<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const QUANTITY = 30;
    public function run(): void
    {
        // Product::query()->delete();
        Product::factory()
                    ->count(self::QUANTITY)
                    ->create();
    }
}
