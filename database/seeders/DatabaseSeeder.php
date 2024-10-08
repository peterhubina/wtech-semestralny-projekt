<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            TagSeeder::class,
        ]);

        $categories = Category::all();

        // For each category, create 10 products
        foreach ($categories as $category) {
            Product::factory()->count(10)->create([
                'category_id' => $category->id,
            ]);
        }

        $this->call([
            ImageSeeder::class,
            ProductTagSeeder::class,
            UserSeeder::class,
            UserCartsWithItemsSeeder::class,
            TitularImagesSeeder::class
        ]);
    }
}
