@extends('components.layout')

@section('title', 'Checkout')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite('resources/css/templates.css')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
@endsection

@section('content')
<main class="flex flex-col py-10 p-6 sm:px-12">
    <div class="flex gap-8 xl:gap-20 flex-col xl:flex-row">
        <!-- Form -->
        <div class="flex flex-col gap-4 w-full">
            <div class="text-lg lg:text-xl xl:text-2xl">Shipping information</div>
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-8">
                <div class="flex flex-col sm:w-[50%]">
                    <label for="first_name">First name</label>
                    <input type="text" name="first_name" id="first_name"
                           class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5" required>
                </div>
                <div class="flex flex-col sm:w-[50%]">
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" id="last_name"
                           class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5" required>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-8">
                <div class="flex flex-col sm:w-[50%]">
                    <label for="phone">Phone number</label>
                    <input type="tel" name="phone" id="phone"
                           class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5" required>
                </div>
                <div class="flex flex-col sm:w-[50%]">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                           class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5" required>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-2 sm:gap-8">
                <div class="flex flex-col sm:w-[50%]">
                    <label for="apartment_number">Apartment number</label>
                    <input type="text" name="apartment_number" id="apartment_number"
                           class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5" required>
                </div>
                <div class="flex flex-col sm:w-[50%]">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address"
                           class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5" required>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-8">
                <div class="flex flex-col sm:w-[50%]">
                    <label for="postal_code">Postal code</label>
                    <input type="text" name="postal_code" id="postal_code"
                           class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5" required>
                </div>
                <div class="flex flex-col sm:w-[50%]">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city"
                           class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5" required>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="note">Note</label>
                <textarea rows="6" name="note" id="note"
                          class="lg:w-full border-2 border-neutral-500 rounded-lg p-1.5"></textarea>
            </div>
        </div>
        <!-- Summary -->
        <div class="flex flex-col gap-2">
            <h2 class="text-lg lg:text-xl xl:text-2xl">Summary of your order</h2>
            <div class="flex flex-col gap-0.5">
                <span class="bg-black w-full h-0.5"></span>
                <!-- Summary elements -->
                <div
                    class="flex bg-neutral-200 py-2 md:py-3 xl:py-4 px-2 justify-between items-center flex-col sm:flex-row gap-4 sm:gap-10 md:gap-20 xl:gap-0">
                    <p class="xl:w-60 line-clamp-1 xl:line-clamp-2">Cupressus sempervirens Stricta (Italian cypress
                        tree)</p>
                    <div class="flex gap-10">
                        <p>80,00€/ks</p>
                        <p>2ks</p>
                        <p>160,00€</p>
                    </div>
                </div>
                <div
                    class="flex bg-neutral-200 py-2 md:py-3 xl:py-4 px-2 justify-between items-center flex-col sm:flex-row gap-4 sm:gap-10 md:gap-20 xl:gap-0">
                    <p class="xl:w-60 line-clamp-1 xl:line-clamp-2">Cupressus sempervirens Stricta (Italian cypress
                        tree). Lorem ipsum dolor sit amet consectetur.</p>
                    <div class="flex gap-10">
                        <p>80,00€/ks</p>
                        <p>2ks</p>
                        <p>160,00€</p>
                    </div>
                </div>
                <div
                    class="flex bg-neutral-200 py-2 md:py-3 xl:py-4 px-2 justify-between items-center flex-col sm:flex-row gap-4 sm:gap-10 md:gap-20 xl:gap-0">
                    <p class="xl:w-60 line-clamp-1 xl:line-clamp-2">Cupressus sempervirens Stricta (Italian cypress
                        tree)</p>
                    <div class="flex gap-10">
                        <p>80,00€/ks</p>
                        <p>2ks</p>
                        <p>160,00€</p>
                    </div>
                </div>
                <span class="bg-black w-full h-0.5"></span>
            </div>
            <div class="flex text-lg xl:text-xl py-2 justify-between">
                <div class="flex flex-col items-end gap-0.5">
                    <p>Sum without tax:</p>
                    <p>DPH:</p>
                    <p>Sum with tax:</p>
                </div>
                <div class="flex flex-col items-end gap-0.5">
                    <p>512,00€</p>
                    <p>128,00€</p>
                    <p>640,00€</p>
                </div>
            </div>
            <span class="bg-black w-full h-0.5"></span>
            <!-- Shipping and payment options -->
            <div class="flex flex-col gap-4">
                <h2 class="text-lg lg:text-xl xl:text-2xl">Shipping options</h2>
                <div class="flex gap-4 items-center text-lg">
                    <input type="radio" name="shipping" id="courier" checked class="cursor-pointer">
                    <label for="courier" class="cursor-pointer">Courier</label>
                    <input type="radio" name="shipping" id="us" class="cursor-pointer">
                    <label for="us" class="cursor-pointer">Us</label>
                    <input type="radio" name="shipping" id="personal" class="cursor-pointer">
                    <label for="personal" class="cursor-pointer">Personal take</label>
                </div>
                <h2 class="text-lg lg:text-xl xl:text-2xl">Payment options</h2>
                <div class="flex gap-4 items-center text-lg">
                    <input type="radio" name="payment" id="card" checked class="cursor-pointer">
                    <label for="card" class="cursor-pointer">Card</label>
                    <input type="radio" name="payment" id="google" class="cursor-pointer">
                    <label for="google" class="cursor-pointer">Google pay</label>
                </div>
            </div>
            <button class="bg-black text-white w-full h-14 rounded-xl text-lg">Continue to payment</button>
        </div>
    </div>
</main>
@endsection
