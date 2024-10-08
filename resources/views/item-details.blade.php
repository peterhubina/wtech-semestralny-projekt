@extends('components.layout')

@section('title', 'Item Details')

@section('stylesheets')
    @vite('resources/css/item-details.css')
@endsection

@section('scripts')
    @vite('resources/js/counter.js')
@endsection

@section('content')
    @if (session('cart-message'))
        <div id="cart-popup" class="cart-popup">
            {{ session('cart-message') }}
        </div>
    @endif
    <main class="login-page">
        <div class="content-container my-5">
            <div class="container my-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-img-wrapper">
                            @if ($product->images->isNotEmpty())
                                <img
                                    src="{{ asset($product->getTitular()->first()->imagePath)  }}"
                                    alt="{{ $product->images->first()->altText }}"
                                    class="img-fluid mb-3"
                                />
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6 gallery-item">
                                <img
                                    src="{{ asset($product->getTitular()->slice(1, 1)->first()->imagePath) }}"
                                    alt="{{ $product->getTitular()->slice(1, 1)->first()->altText }}"
                                    class="img-fluid card"
                                />
                            </div>
                            <div class="col-6 gallery-item">
                                <img
                                    src="{{ asset($product->getTitular()->slice(2, 1)->first()->imagePath) }}"
                                    alt="{{ $product->getTitular()->slice(2, 1)->first()->altText }}"
                                    class="img-fluid card"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h2>{{ $product->title }}</h2>
                        <div class="tags">
                            @if($product->tags->isNotEmpty())
                                @foreach ($product->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->title }}</span>
                                @endforeach
                            @endif
                        </div>


                        <p class="mt-3"><strong>{{ $product->height }}cm</strong></p>
                        <h3 class="mb-4">{{ number_format($product->price, 2) }} €</h3>

                        <div
                            class="selector d-flex align-items-center mb-4 flex-row"
                        >
                            <form action={{ route('shopping-cart.add', $product) }} method="POST">
                                @csrf
                                <div class="quantity-selector d-flex mb-3">
                                    <button class="btn btn-outline-secondary quantity-minus"
                                            type="button"
                                            data-type="minus"
                                            data-field=""
                                    >
                                        -
                                    </button>
                                    <input id="quantity"
                                           name="quantity"
                                           type="number"
                                           class="form-control text-center  quantity-input"
                                           value="1"
                                           min="1"
                                           max="100"
                                    />
                                    <button class="btn btn-outline-secondary quantity-plus"
                                            type="button"
                                            data-type="plus"
                                            data-field=""
                                    >
                                        +
                                    </button>
                                </div>
                                <button class="shopping-button btn btn-dark" type="submit"
                                >
                                    Add to shopping cart&nbsp;&nbsp;
                                    <i class="fa fa-cart-plus"></i>
                                </button>
                            </form>
                            @if (Auth::check())
                                @if ($cart && $cart->cartItems->where('product_id', $product->id)->first())
                                    <div class="mt-auto">
                                        <form action="{{ route('shopping-cart.remove', $product) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Remove from cart</button>
                                        </form>
                                    </div>
                                @endif
                            @else
                                @if (array_key_exists($product->id, $cart))
                                    <div class="mt-auto">
                                        <form action="{{ route('shopping-cart.remove', $product) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" style="min-height: 3.1rem">Remove from cart</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

