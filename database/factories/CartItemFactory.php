<?php

namespace Database\Factories;

use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        $quantity = $this->faker->numberBetween(1, 5);

        return [
            'cart_id' => Cart::factory(),
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price_summary' => $product->price * $quantity,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
