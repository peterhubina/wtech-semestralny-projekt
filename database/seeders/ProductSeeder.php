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
        $categories = Category::all();

        foreach ($categories as $category) {
            $products = Product::factory()->count(10)->make()->each(function ($product) use ($category) {
                $product->category_id = $category->id;
                $product->save();

                Image::factory()->create([
                    'product_id' => $product->id,
                ]);
            });
        }
    }
}
