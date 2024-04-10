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
        $fakerFileName = $this->faker->image(
            storage_path("app/public/img"),
            800,
            600
        );

        return [
            'title' => $this->faker->word,
            'imagePath' => "app/public/img/" . basename($fakerFileName),
            'altText' => $this->faker->sentence,
            'productId' => Product::inRandomOrder()->first()->id,
        ];
    }
}
