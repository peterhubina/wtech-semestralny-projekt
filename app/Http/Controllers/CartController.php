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
        $cartItems = [];
        $total_price = 0;

        if (Auth::check()) {
            // User is authenticated, get the user and their cart from the database
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            if ($cart) {
                $cartItems = $cart->cartItems()->orderBy('created_at', 'desc')->get()->filter(function ($cartItem) {
                    // Only include the cart item if the associated product exists
                    return $cartItem->product !== null;
                });
                $total_price = $cart->total_price;
            }
        } else {
            // User is a guest, get the cart from the session
            $cart = session('cart', []);
            foreach ($cart as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $cartItem = new CartItem($item);
                    $cartItems[] = $cartItem;
                    $total_price += $cartItem->price_summary;
                }
            }
            // Order the cart items by creation time in descending order
            $cartItems = array_reverse($cartItems);
        }

        return view('shopping-cart', compact('cartItems', 'total_price'));
    }

    public function checkout()
    {
        $cartItems = [];
        $total_price = 0;

        if (Auth::check()) {
            // User is authenticated, get the user and their cart from the database
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            if ($cart) {
                $cartItems = $cart->cartItems->filter(function ($cartItem) {
                    // Only include the cart item if the associated product exists
                    return $cartItem->product !== null;
                });
                $total_price = $cart->total_price;
            }
        } else {
            // User is a guest, get the cart from the session
            $cart = session('cart', []);
            foreach ($cart as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $cartItem = new CartItem($item);
                    $cartItems[] = $cartItem;
                    $total_price += $cartItem->price_summary;
                }
            }
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

        }
        return back()->with('cart-message', 'Product added to cart successfully');
    }

    public function removeItem(Request $request)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // User is authenticated, get the user and their cart from the database
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            if ($cart) {
                $productId = $request->input('product_id');
                $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();
                if ($cartItem) {
                    $cartItem->delete();
                    // Update the cart's total price
                    $cart->total_price = $cart->cartItems->sum(function ($item) {
                        return $item->price_summary;
                    });
                    $cart->save();
                }
            }
        } else {
            // User is a guest, get the cart from the session
            $cart = session('cart', []);
            $productId = $request->input('product_id');
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                // Save the updated cart back to the session
                session(['cart' => $cart]);
            }
        }

        return back()->with('cart-message', 'Product removed from cart successfully');
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Auth::check()) {
            // User is logged in, update the quantity in the database
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
            if ($cart) {
                $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();
                if ($cartItem) {
                    $cartItem->quantity = $quantity;
                    $cartItem->price_summary = $quantity * $cartItem->product->price;
                    $cartItem->save();

                    $cart->total_price = $cart->cartItems->sum('price_summary');
                    $cart->save();
                }
            }
        } else {
            // User is not logged in, update the quantity in the session
            $cart = session('cart', []);
            if (isset($cart[$productId])) {
                $product = Product::find($productId); // Retrieve the product from the database
                if ($product) {
                    $cart[$productId]['quantity'] = $quantity;
                    $cart[$productId]['price_summary'] = $quantity * $product->price; // Update the price summary using the product price

                    $total_price = 0;
                    foreach ($cart as $item) {
                        $total_price += $item['price_summary'];
                    }
                    session(['cart' => $cart, 'total_price' => $total_price]);
                }
            }
        }

        return redirect()->route('shopping-cart.show');
    }
}
