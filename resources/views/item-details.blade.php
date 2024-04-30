@extends('components.layout')

@section('title', 'Item Details')

@section('stylesheets')
    @vite('resources/css/item-details.css')
    @vite('resources/js/counter.js')
@endsection

@section('content')

    <main class="login-page">
        <div class="content-container my-5">
            <div class="container my-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-img-wrapper">
                            @if ($product->images->isNotEmpty())
                                <img
                                    src="{{ asset('storage/' . $product->images->first()->imagePath) }}"
                                    alt="{{ $product->images->first()->altText }}"
                                    class="img-fluid mb-3"
                                />
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <img
                                    src="{{ asset('storage/' . $product->images[1]->imagePath) }}"
                                    alt="{{ $product->images[1]->altText }}"
                                    class="img-fluid card"
                                />
                            </div>
                            <div class="col-6">
                                <img
                                    src="{{ asset('storage/' . $product->images[2]->imagePath) }}"
                                    alt="{{ $product->images[2]->altText }}"
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
                            <form action={{ route('cart.add', $product) }} method="POST">
                                @csrf
                                <div class="quantity-selector d-flex">
                                    <button class="btn btn-outline-secondary quantity-minus"
                                       type="button"
                                       data-type="minus"
                                       data-field=""
                                    >
                                        -
                                    </button>
                                    <input id="quantity"
                                      type="text"
                                      class="form-control text-center"
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
                                <button class="shopping-button btn btn-primary" type="submit"
                                >
                                    Add to shopping cart
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </form>
                        </div>
                        <p>{{ $product->description }}</p>
                        <!-- Additional information could go here -->
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

