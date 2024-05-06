@extends('components.layout')

@section('title', 'Shopping Cart')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite('resources/css/templates.css')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
@endsection

@section('content')
    @if (session('error'))
        <div id="error-popup" class="error-popup">
            {{ session('error') }}
        </div>
    @endif
    @if (session('cart-message'))
        <div id="cart-popup" class="cart-popup">
            {{ session('cart-message') }}
        </div>
    @endif
    <main class="flex flex-col items-center py-10 px-6">
        @if (!$cartItems || sizeof($cartItems) == 0)
            <div class="flex flex-col items-center gap-4">
                <h2 class="text-5xl">🧺</h2>
                <h2 class="text-2xl">Your shopping cart is empty</h2>
                <a href="{{ route('all-plants.show') }}"
                   class="flex items-center justify-center bg-black text-white w-full h-14 rounded-xl text-lg hover:no-underline hover:bg-neutral-800">
                    ⬅️ Go back to shopping
                </a>
            </div>
        @else
            <div class="flex gap-10 flex-col xl:flex-row">
                <!-- Cards -->
                <div class="flex flex-col gap-4">
                    <!-- Card elements -->
                    @foreach($cartItems as $cartItem)
                        <div
                            class="flex flex-col sm:flex-row sm:items-center bg-white rounded-2xl border overflow-clip gap-4 hover:cursor-pointer">
                            <img src="{{ $cartItem->product->getTitular()->first()->imagePath }}" alt="plant"
                                 class="object-cover h-80 sm:h-52 xl:h-44 sm:w-40">
                            <div class="flex flex-col xl:flex-row items-start gap-4 xl:gap-4 p-4 w-full">
                                <div class="flex flex-col gap-2 w-full">
                                    <p class="text-xl line-clamp-2">{{ $cartItem->product->title }}</p>
                                    <div class="flex flex-row justify-between gap-4">
                                        <p class="text-black text-opacity-50 text-xl">{{ $cartItem->product->height }}
                                            cm</p>
                                        <p class="text-black text-opacity-75 text-xl">{{ $cartItem->product->price }}
                                            €/ks</p>
                                    </div>
                                </div>
                                <div
                                    class="flex gap-4 sm:flex-row items-end xl:items-center sm:justify-end justify-between xl:justify-end w-full">
                                    <div
                                        class="flex flex-col sm:flex-row xl:flex-col order-1 sm:order-none gap-4 items-end sm:items-center">
                                        <p class="text-2xl"
                                           id="total-item-price-{{ $cartItem->product->id }}">{{ $cartItem->price_summary }}
                                            €</p>
                                        <form class="flex gap-2">
                                            <input type="number" name="quantity"
                                                   class="quantity-input flex justify-center items-center w-20 border rounded-xl"
                                                   value="{{ $cartItem->quantity }}" min="1"
                                                   data-product-id="{{ $cartItem->product->id }}">
                                            <div class="flex flex-col">
                                                <button class="text-2xl h-6 w-10 flex justify-center"
                                                        onclick="changeQuantity(this, 'up')">
                                                    <i class="fa-sort-up fas translate-y-[20%]"></i>
                                                </button>
                                                <button class="text-2xl h-6 w-10 flex justify-center"
                                                        onclick="changeQuantity(this, 'down')">
                                                    <i class="fa-sort-down fas translate-y-[-20%]"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <form method="POST" action="{{ route('shopping-cart.remove') }}"
                                          class="order-none sm:order-1">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $cartItem->product->id }}">
                                        <button
                                            class="size-12 rounded-xl relative flex items-center justify-center bg-red-500">
                                            <i class="absolute text-white fa-shopping-cart fas text-lg"></i>
                                            <span class="rotate-45 w-[60%] flex flex-col absolute">
                                                <span class="h-0.5 w-full rounded-full bg-red-500"></span>
                                                <span class="h-0.5 w-full rounded-full bg-white"></span>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Summary -->
                <div class="flex flex-col gap-2">
                    <h2 class="text-lg lg:text-xl xl:text-2xl">Summary of your order</h2>
                    <div class="flex flex-col gap-0.5">
                        <span class="bg-black w-full h-0.5"></span>
                        <!-- Summary elements -->
                        @foreach($cartItems as $cartItem)
                            <div
                                class="flex bg-neutral-200 py-2 md:py-3 xl:py-4 px-2 justify-between items-center flex-col sm:flex-row gap-4 sm:gap-10 md:gap-20 xl:gap-0">
                                <a href="{{ route('item-details.show', $cartItem->product) }}">
                                    <p class="xl:w-60 line-clamp-1 xl:line-clamp-2">{{ $cartItem->product->title }}</p>
                                </a>
                                <div class="flex gap-10">
                                    <p id="price-per-item-{{ $cartItem->product->id }}">{{ $cartItem->product->price }}
                                        €/ks</p>
                                    <p>{{ $cartItem->quantity }}ks</p>
                                    <p>{{ $cartItem->price_summary }}€</p>
                                </div>
                            </div>
                        @endforeach
                        <span class="bg-black w-full h-0.5"></span>
                    </div>
                    <div class="flex text-lg xl:text-xl py-2 justify-between">
                        <div class="flex flex-col items-end gap-0.5">
                            <p>Sum without tax:</p>
                            <p>DPH:</p>
                            <p>Sum with tax:</p>
                        </div>
                        <div class="flex flex-col items-end gap-0.5">
                            <p>{{ $total_price * 0.8 }}€</p>
                            <p>{{ $total_price * 0.2 }}€</p>
                            <p>{{ $total_price }}€</p>
                        </div>
                    </div>
                    <span class="bg-black w-full h-0.5"></span>
                    <a href="{{ route ('checkout.show')}}"
                       class="checkout-button flex items-center justify-center bg-black text-white w-full h-14 rounded-xl text-lg hover:no-underline hover:bg-neutral-800">Continue
                        to checkout</a>
                </div>
            </div>
        @endif
    </main>
    <script>
        function changeQuantity(button, direction) {
            event.preventDefault();

            const form = button.closest('form');
            const input = form.querySelector('.quantity-input');
            let currentValue = parseInt(input.value);

            if (direction === 'up') {
                input.value = currentValue + 1;
            } else if (direction === 'down') {
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                }
            }

            if (isNaN(currentValue) || currentValue == null || currentValue < 1) {
                input.value = 1;
            }

            // Update the summary of your order
            const productId = input.getAttribute('data-product-id');
            const pricePerItemElement = document.querySelector(`#price-per-item-${productId}`);
            let pricePerItem = 0;
            if (pricePerItemElement) {
                pricePerItem = parseFloat(pricePerItemElement.innerText.replace(/[^\d.-]/g, ''));
            }
            const totalItemPrice = document.querySelector(`#total-item-price-${productId}`);
            totalItemPrice.innerText = (input.value * pricePerItem).toFixed(2) + " €";
        }

        document.querySelector('.checkout-button').addEventListener('click', function (e) {
            e.preventDefault();

            let quantities = [];
            document.querySelectorAll('.quantity-input').forEach(function (input) {
                quantities.push({
                    product_id: input.getAttribute('data-product-id'),
                    quantity: input.value
                });
            });

            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/shopping-cart';

            quantities.forEach(function (item) {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'quantities[' + item.product_id + ']';
                input.value = item.quantity;
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        });
    </script>
@endsection
