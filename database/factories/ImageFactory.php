<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageFile = $this->faker->image(
            storage_path("app/public/images"),
            800,
            600
        );

        return [
            'title' => $this->faker->word,
            'imagePath' => Storage::disk('public')->putFile('images', $imageFile),
            'altText' => $this->faker->sentence,
            'product_id' => Product::inRandomOrder()->first()->id,
        ];
    }
}
