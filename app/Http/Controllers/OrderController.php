<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function checkout(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => ['required', 'regex:/^(\+\d{1,3}[- ]?)?\d{10}$/'],
            'email' => 'required|email',
            'apartment_number' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'shipping' => 'required',
            'payment' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            if ($errors->has('phone')) {
                return redirect()->back()->with('error', 'The phone number format is incorrect. Please try again.');
            }

            if ($errors->has('email')) {
                return redirect()->back()->with('error', 'The email format is incorrect. Please try again.');
            }

            // If none of the above conditions are met, return a general error message
            return redirect()->back()->with('error', 'There was a problem with your submission. Please make sure all fields are filled properly and try again.');
        }

        $validatedData = $validator->validated();

        // Get the current user's cart
        $user = Auth::user();
        $userId = $user ? $user->id : null;
        $cart = $userId ? Cart::where('user_id', $userId)->first() : session('cart', []);

        // Security check if cart is not empty
        if (!$cart || (is_array($cart) && count($cart) === 0)) {
            return redirect()->back()->with('error', 'Your cart is empty. Please add some items to your cart before proceeding to payment.');
        }

        $cartItems = $userId ? $cart->cartItems : $cart;

        // Calculate the total price from the cart items
        $totalPrice = 0;
        if ($userId) {
            $totalPrice = $cartItems->reduce(function ($carry, $item) {
                return $carry + $item->price_summary;
            }, 0);
        } else {
            $totalPrice = array_reduce($cartItems, function ($carry, $item) {
                return $carry + $item['price_summary'];
            }, 0);
        }

        // Create an address
        $address = new Address;
        $address->apartmentNumber = $request->apartment_number;
        $address->address = $request->address;
        $address->zipcode = $request->postal_code;
        $address->city = $request->city;
        $address->created_at = now();
        $address->save();

        // Create shipping information
        $shippingInfo = new ShippingInfo;
        $shippingInfo->firstname = $request->first_name;
        $shippingInfo->lastname = $request->last_name;
        $shippingInfo->phoneNumber = $request->phone;
        $shippingInfo->email = $request->email;
        $shippingInfo->note = $request->note;
        $shippingInfo->delivery = $request->shipping;
        $shippingInfo->address_id = $address->id;
        $shippingInfo->created_at = now();
        $shippingInfo->save();

        // Create a new order
        $order = new Order;
        $order->totalPrice = $totalPrice;
        $order->payment = $request->payment;
        $order->user_id = $userId;
        $order->created_at = now();
        $order->shipping_id = $shippingInfo->id;
        $order->save();

        // Create order items
        foreach ($cartItems as $item) {
            $orderItem = new OrderItem;
            if ($userId) {
                $orderItem->quantity = $item->quantity;
                $orderItem->priceSummary = $item->price_summary;
                $orderItem->product_id = $item->product_id;
            } else {
                $orderItem->quantity = $item['quantity'];
                $orderItem->priceSummary = $item['price_summary'];
                $orderItem->product_id = $item['product_id'];
            }
            $orderItem->order_id = $order->id;
            $orderItem->created_at = now();
            $orderItem->save();
        }

        // Remove the cart from the session or set the cart status to closed
        if ($userId) {
            $cart->status = Cart::STATUS_CLOSED;
            $cart->save();
        } else {
            $request->session()->forget('cart');
        }

        // Redirect the user to the home page with a success message
        return redirect()->route('home.show')->with('success', 'Your order has been successfully processed!');
    }
}
