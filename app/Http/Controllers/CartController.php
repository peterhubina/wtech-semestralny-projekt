<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // TODO: Implement user from Auth::user() instead of hardcoding
        $user = User::where('role', 'User')->first();
        $cart = Cart::where('user_id', $user->id)->first();

        $cartItems = [];
        $total_price = 0;

        if ($cart) {
            $cartItems = $cart->cartItems;
            $total_price = $cart->total_price;
        }

        return view('shopping-cart', compact('cartItems', 'total_price'));
    }

    public function checkout()
    {
        // TODO: Implement user from Auth::user() instead of hardcoding
        $user = User::where('role', 'User')->first();
        $cart = Cart::where('user_id', $user->id)->first();

        $cartItems = [];
        $total_price = 0;

        if ($cart) {
            $cartItems = $cart->cartItems;
            $total_price = $cart->total_price;
        }

        if (!$cartItems || sizeof($cartItems) == 0) {
            return redirect()->route('shopping-cart.show')->with('error', 'Your cart is empty. Please add some products to your cart before proceeding to checkout.');
        }

        return view('checkout', compact('cartItems', 'total_price'));
    }

    public function addToCart(Request $request, Product $product)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            // Store the product ID in the session
        } else {
            $user = Auth::user();

            // Find or create a cart for the user
            $cart = Cart::firstOrCreate(
                ['user_id' => $user->id,
                    'total_price' => 0]
            );

            // Check if the product is already in the cart
            $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

            if ($cartItem) {
                // If already in the cart, just update the quantity and price summary
                $cartItem->quantity += $request->quantity;
                $cartItem->priceSummary = $cartItem->quantity * $product->price;
            } else {
                // If not in the cart, create a new cart item
                $cartItem = new CartItem([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                    'price_summary' => $request->quantity * $product->price
                ]);
            }

            $cartItem->save();

            // Update the cart's total price
            $cart->total_price = $cart->cartItems->sum(function ($item) {
                return $item->price_summary;
            });
            $cart->save();

            return response()->json(['message' => 'Product added to cart successfully']);
        }
    }
}
