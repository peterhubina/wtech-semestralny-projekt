<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = auth()->user();
        $product = Product::find($request->product_id);

        // Check if the user already has a cart, otherwise create a new one
        $cart = $user->cart ?? new Cart();
        $cart->user_id = $user ? $user->id : 0;
        $cart->totalPrice = 0;
        $cart->save();

        // Check if the product is already in the cart
        $cartItem = $cart->cartItems()->where('product_id', $product->id)->first();

        if ($cartItem) {
            // Update quantity if product exists in the cart
            $cartItem->quantity += $request->quantity;
        } else {
            // Create a new cart item
            $cartItem = new CartItem([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'priceSummary' => $product->price * $request->quantity
            ]);
            $cartItem->cart_id = $cart ? $cart->id : 0;
            $cart->cartItems()->save($cartItem);
        }

        // Update the total price of the cart
        $cart->totalPrice = $cart->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        $cart->save();

        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }
}
