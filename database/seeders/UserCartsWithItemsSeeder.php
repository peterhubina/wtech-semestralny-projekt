<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Database\Seeder;

class UserCartsWithItemsSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function ($user) {
            Cart::factory(rand(1, 3))->create(['user_id' => $user->id])->each(function ($cart) {
                $cartItems = CartItem::factory(rand(1, 3))->create(['cart_id' => $cart->id]);
                $totalPrice = $cartItems->sum('price_summary');
                $cart->update(['total_price' => $totalPrice]);
            });
        });
    }
}
