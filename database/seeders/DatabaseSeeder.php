<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'price' => rand(100, 1000),
                'count' => rand(10, 100),
            ]);
        }
    }
}
