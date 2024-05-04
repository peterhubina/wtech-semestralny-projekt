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
            $cart = session('cart', []);

            // Check if the product is already in the session cart
            if (isset($cart[$product->id])) {
                // Update quantity and price summary
                $cart[$product->id]['quantity'] += $request->quantity;
                $cart[$product->id]['price_summary'] = $cart[$product->id]['quantity'] * $product->price;
            } else {
                // Add new product to the cart
                $cart[$product->id] = [
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                    'price_summary' => $request->quantity * $product->price
                ];
            }

            // Save the updated cart back to the session
            session(['cart' => $cart]);

            return response()->json(['message' => 'Product added to cart successfully']);
        } else {
            $user = Auth::user();

            $cart = Cart::where('user_id', $user->id)->first();

            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => $user->id,
                    'total_price' => 0 
                ]);
            }

            // Check if the product is already in the cart
            $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

            if ($cartItem) {
                // If already in the cart, just update the quantity and price summary
                $cartItem->quantity += $request->quantity;
                $cartItem->price_summary = $cartItem->quantity * $product->price;
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
