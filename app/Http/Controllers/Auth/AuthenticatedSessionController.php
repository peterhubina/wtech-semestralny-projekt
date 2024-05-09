<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.user-login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        session(['showModal' => true]);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $accountCart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();

        if ($accountCart) {
            $accountCartCopy = [];
            foreach ($accountCart->cartItems as $cartItem) {
                $accountCartCopy[$cartItem->product_id] = [
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price_summary' => $cartItem->price_summary
                ];
            }
            session(['accountCartCopy' => $accountCartCopy]);
        }

        $sessionCart = session('cart', []);
        $accountCartCopy = session('accountCartCopy', []);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session(['cart' => $sessionCart, 'accountCartCopy' => $accountCartCopy, 'showModal' => true]);

        return redirect('/');
    }
}
