<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductTag>
 */
class ProductTagFactory extends Factory
{
    protected $model = \App\Models\ProductTag::class;

    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'tag_id' => Tag::inRandomOrder()->first()->id,
        ];
    }
}
