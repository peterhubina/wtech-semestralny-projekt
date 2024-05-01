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
        $imageSeed = rand(1, 10000);
        $randomImage = "https://picsum.photos/seed/{$imageSeed}/800/600";

        return [
            'title' => $this->faker->word,
            'imagePath' => $randomImage,
            'altText' => $this->faker->sentence
        ];
    }
}
