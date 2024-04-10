<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => $this->faker->word,
            'imagePath' => $this->faker->imageUrl(), // Generates a random image URL
            'altText' => $this->faker->sentence,
            'productId' => Product::inRandomOrder()->first()->id, // Gets a random product ID
            //
        ];
    }
}
