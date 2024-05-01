@extends('components.layout')

@section('title', 'Shopping Cart')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite('resources/css/templates.css')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
@endsection

@section('content')
<main class="flex flex-col min-h-[63vh] items-center py-10 px-6">
    <div class="flex gap-10 flex-col xl:flex-row">
        <!-- Cards -->
        <div class="flex flex-col gap-4">
            <!-- Card elements -->
            <div class="flex flex-col sm:flex-row sm:items-center bg-white rounded-2xl border overflow-clip gap-4">
                <img src="{{ asset('assets/img/thuja.webp') }}" alt="plant"
                     class="object-cover h-80 sm:h-52 xl:h-44">
                <div class="flex flex-col xl:flex-row items-start gap-4 xl:gap-4 p-4 w-full">
                    <div class="flex flex-col gap-2 xl:w-full">
                        <p class="text-xl line-clamp-2">Cupressus sempervirens Stricta (Italian cypress
                            tree)</p>
                        <div class="flex flex-row justify-between">
                            <p class="text-black text-opacity-50 text-xl">120 cm</p>
                            <p class="text-black text-opacity-75 text-xl">80,00 €/ks</p>
                        </div>
                    </div>
                    <div
                        class="flex gap-4 sm:flex-row items-end xl:items-center justify-end sm:justify-between xl:justify-end w-full">
                        <div
                            class="flex flex-col sm:flex-row xl:flex-col gap-4 items-end sm:items-center">
                            <p class="text-2xl">160,00 €</p>
                            <div class="flex gap-2">
                                <div class="flex justify-center items-center w-20 border rounded-xl">
                                    <p>2</p>
                                </div>
                                <div class="flex flex-col">
                                    <button class="text-2xl h-6 w-10 flex  justify-center"><i
                                            class="fa-sort-up fas"></i></button>
                                    <button class="text-2xl h-6 w-10 flex items-center justify-center"><i
                                            class="fa-sort-down fas"></i></button>
                                </div>
                            </div>
                        </div>
                        <button class="size-12 rounded-xl relative flex items-center justify-center bg-red-500">
                            <i class="absolute text-white fa-shopping-cart fas text-lg"></i>
                            <span class="rotate-45 w-[60%] flex flex-col absolute">
                                <span class="h-0.5 w-full rounded-full bg-red-500"></span>
                                <span class="h-0.5 w-full rounded-full bg-white"></span>
                            </span>
                        </button>
                    </div>
                </div>
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
            <a href="{{ route ('checkout.show')}}"
               class="flex items-center justify-center bg-black text-white w-full h-14 rounded-xl text-lg hover:no-underline hover:bg-neutral-800">Continue
                to checkout</a>
        </div>
    </div>
</main>
@endsection
