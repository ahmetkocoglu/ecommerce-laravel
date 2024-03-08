<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Price;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\Product::factory(100)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\ProductCategory::factory(100)->create();

        foreach (range(1, 100) as $index) {
            $price = rand(1, 100) * 100;

            Price::create([
                'product_id' => $index,
                'price' => $price,
                'discount_price' => $price - ($price / 100) * 10,
                'discount_rate' => 10
            ]);
        }

        foreach (range(1, 100) as $index) {
            Comment::create([
                'product_id' => $index,
                'user_id' => rand(1, 6),
                'comment' => 'açıklayıcı metin',
            ]);
        }
    }
}
