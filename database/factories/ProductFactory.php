<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productCode' => $this->faker->bothify('?????-#####'), // Random string like ABCD-12345
            'title' => $this->faker->words(3, true), // Random title consisting of 3 words
            'height' => $this->faker->randomNumber(2), // Random number with 2 digits
            'description' => $this->faker->text(200), // Random text with 200 characters
            'price' => $this->faker->randomFloat(2, 1, 1000), // Random float between 1 and 1000 with 2 decimal places
            'stockQuantity' => $this->faker->numberBetween(0, 100), // Random number between 0 and 100
            'category_id' => Category::inRandomOrder()->first()->id, // Assuming you have a CategoryFactory
        ];
    }
}
