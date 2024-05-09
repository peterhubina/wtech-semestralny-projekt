<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
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
            $cart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();
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
            $cart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();
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
        $quantity = $request->input('quantity');

        if ($quantity <= 0) {
            $quantity = 1;
        }

        // Check if the user is logged in
        if (!Auth::check()) {
            $cart = session('cart', []);

            // Check if the product is already in the session cart
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity'] += $quantity;
                $cart[$product->id]['price_summary'] = $cart[$product->id]['quantity'] * $product->price;
            } else {
                $cart[$product->id] = [
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price_summary' => $quantity * $product->price
                ];
            }

            session(['cart' => $cart]);
        } else {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();

            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => $user->id,
                    'total_price' => 0,
                    'status' => Cart::STATUS_ACTIVE
                ]);
            }

            // Check if the product is already in the cart
            $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->price_summary = $quantity * $product->price;
            } else {
                $cartItem = new CartItem([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price_summary' => $quantity * $product->price
                ]);
            }

            $cartItem->save();

            $cart->total_price = $cart->cartItems->sum(function ($item) {
                return $item->price_summary;
            });
            $cart->save();

        }
        return back()->with('cart-message', 'Product added to cart successfully');
    }

    public function removeItem(Request $request)
    {
        if (Auth::check()) {
            // User is authenticated, get the user and their cart from the database
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();

            if ($cart) {
                $productId = $request->input('product_id');
                $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();
                if ($cartItem) {
                    $cartItem->delete();

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
            $cart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();

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
                $product = Product::find($productId);
                if ($product) {
                    $cart[$productId]['quantity'] = $quantity;
                    $cart[$productId]['price_summary'] = $quantity * $product->price;

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

    public function emptyCart(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();

            if ($cart) {
                $cart->status = Cart::STATUS_CLOSED;
                $cart->save();
            }
        } else {
            $request->session()->forget('cart');
        }

        session()->forget('showModal');

        return back()->with('success', 'Cart emptied successfully');
    }

    public function accountCart(Request $request)
    {
        if (Auth::check()) {
            session()->forget('showModal');

            return back()->with('success', 'Account cart selected successfully');
        } else {
            $copyCart = session('accountCartCopy', []);

            // Copy the account cart to the session guest cart
            if (!empty($copyCart)) {
                session(['cart' => $copyCart]);
                session()->forget('accountCartCopy');
            }

            session()->forget('showModal');

            return back()->with('success', 'Account cart copied successfully');
        }
    }

    public function guestCart(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $activeCart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();

            if ($activeCart) {
                $activeCart->status = Cart::STATUS_CLOSED;
                $activeCart->save();
            }

            // New cart with items from the guest cart
            $guestCart = session('cart', []);
            if (!empty($guestCart)) {
                $newCart = Cart::create([
                    'user_id' => $user->id,
                    'total_price' => 0,
                    'status' => Cart::STATUS_ACTIVE
                ]);

                foreach ($guestCart as $item) {
                    CartItem::create([
                        'cart_id' => $newCart->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price_summary' => $item['price_summary']
                    ]);
                }

                $newCart->total_price = $newCart->cartItems->sum('price_summary');
                $newCart->save();
            }

            session()->forget('showModal');

            return back()->with('success', 'Guest cart copied successfully');
        } else {
            session()->forget('showModal');

            return back()->with('success', 'Guest cart selected successfully');
        }
    }

    public function mergeCarts(Request $request)
    {
        $guestCart = session('cart', []);

        if (Auth::check()) {
            // User is authenticated, merge of the session guest cart into the user's cart in the database
            $user = Auth::user();
            $activeCart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();

            if (!$activeCart) {
                $activeCart = Cart::create([
                    'user_id' => $user->id,
                    'total_price' => 0,
                    'status' => Cart::STATUS_ACTIVE
                ]);
            }

            foreach ($guestCart as $item) {
                $cartItem = CartItem::where('cart_id', $activeCart->id)->where('product_id', $item['product_id'])->first();
                if ($cartItem) {
                    // Product is already in the user's cart
                    $cartItem->quantity += $item['quantity'];
                    $cartItem->price_summary = $cartItem->quantity * $cartItem->product->price;
                    $cartItem->save();
                } else {
                    CartItem::create([
                        'cart_id' => $activeCart->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price_summary' => $item['price_summary']
                    ]);
                }
            }

            $activeCart->total_price = $activeCart->cartItems->sum('price_summary');
            $activeCart->save();

            session()->forget('showModal');

            return back()->with('success', 'Guest cart merged into account cart successfully');
        } else {
            $accountCartCopy = session('accountCartCopy', []);

            // User is a guest, merge the session account cart copy into the session guest cart
            foreach ($accountCartCopy as $item) {
                if (isset($guestCart[$item['product_id']])) {
                    // If the product is already in the guest cart
                    $guestCart[$item['product_id']]['quantity'] += $item['quantity'];
                    $guestCart[$item['product_id']]['price_summary'] = $guestCart[$item['product_id']]['quantity'] * $item['price_summary'];
                } else {
                    $guestCart[$item['product_id']] = $item;
                }
            }

            session(['cart' => $guestCart]);

            session()->forget('accountCartCopy');
            session()->forget('showModal');

            return back()->with('success', 'Account cart copy merged into guest cart successfully');
        }
    }
}
