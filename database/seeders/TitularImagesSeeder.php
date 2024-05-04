<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class TitularImagesSeeder extends Seeder
{
    public function run()
    {
        $products = Product::with('images')->get();

        foreach ($products as $product) {
            if ($product->images->isEmpty()) {
                continue;
            }

            $product->images()->update(['is_titular' => false]);

            $product->images()->first()->update(['is_titular' => true]);
        }
    }
}


