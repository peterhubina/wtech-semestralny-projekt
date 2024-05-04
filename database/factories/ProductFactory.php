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
        // Generate a random title with 1-5 words
        $titleWords = $this->faker->words($this->faker->numberBetween(2, 8));

        // Randomly decide if the first letter of each word should be uppercase
        if ($this->faker->randomElement([true, false])) {
            foreach ($titleWords as $i => $word) {
                $titleWords[$i] = ucfirst($word);
            }
        }

        $title = implode(' ', $titleWords);

        // Make the first letter uppercase
        $title = ucfirst($title);

        // Define a list of countries
        $countries = ['USA', 'Canada', 'UK', 'Australia', 'Germany'];

        // Define the types
        $types = ['Outdoor', 'Indoor'];

        return [
            'productCode' => $this->faker->bothify('?????-#####'), // Random string like ABCD-12345
            'title' => $title,
            'height' => $this->faker->randomNumber(2), // Random number with 2 digits
            'description' => $this->faker->text(200), // Random text with 200 characters
            'price' => $this->faker->randomFloat(2, 1, 1000), // Random float between 1 and 1000 with 2 decimal places
            'stockQuantity' => $this->faker->numberBetween(0, 100), // Random number between 0 and 100
            'category_id' => Category::inRandomOrder()->first()->id, 
            'country' => $this->faker->randomElement($countries), // Randomly selected country from the list
            'type' => $this->faker->randomElement($types), // Randomly selected type 'Outdoor' or 'Indoor'
        ];
    }
}
