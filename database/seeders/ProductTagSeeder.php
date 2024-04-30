<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::all();
        $minTagsPerProduct = 1;
        $maxTagsPerProduct = 3;

        Product::all()->each(function ($product) use ($tags, $minTagsPerProduct, $maxTagsPerProduct) {
            $countTags = rand($minTagsPerProduct, $maxTagsPerProduct);
            $tagsToAttach = $tags->random($countTags)->pluck('id');
            $product->tags()->attach($tagsToAttach);
        });
    }
}
