<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 4 categories
        $categories = Category::all();

        foreach ($categories as $category) {
            // Create 10 products for each category
            $products = Product::factory()->count(10)->make()->each(function ($product) use ($category) {
                $product->categoryId = $category->id;
                $product->save();

                // Create an image for each product
                Image::factory()->create([
                    'productId' => $product->id,
                    // 'imagePath' should be a valid path. Adjust if needed.
                ]);
            });
        }
    }
}
