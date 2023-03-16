<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const QUANTITY = 10;
    public function run(): void
    {
        // User::query()->delete();
        User::factory()
                ->count(10)
                ->create();
    }
}
