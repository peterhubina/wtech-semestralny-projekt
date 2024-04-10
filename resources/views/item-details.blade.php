@extends('components.layout')

@section('title', 'Item Details')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite('resources/css/templates.css')
    @vite('resources/css/home.css')
    @vite('resources/js/app.js')
    @vite('resources/css/item-details.css')
@endsection

@section('content')
    <main class="login-page">
        <div class="content-container my-5">
            <div class="container my-4">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Main product image -->
                        <div class="product-img-wrapper">
                            <img
                                src="{{ asset('assets/img/thuja.webp') }}"
                                alt="Main product"
                                class="img-fluid mb-3"
                            />
                        </div>
                        <!-- Thumbnails -->
                        <div class="row">
                            <div class="col-4">
                                <img
                                    src="{{ asset('assets/img/thuja.webp') }}"
                                    alt="Thumbnail"
                                    class="img-fluid card"
                                />
                            </div>
                            <div class="col-4">
                                <img
                                    src="{{ asset('assets/img/thuja.webp') }}"
                                    alt="Thumbnail"
                                    class="img-fluid card"
                                />
                            </div>
                            <div class="col-4">
                                <img
                                    src="{{ asset('assets/img/thuja.webp') }}"
                                    alt="Thumbnail"
                                    class="img-fluid card"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>
                            Cupressus sempervirens Stricta (Italian
                            cypress tree)
                        </h2>
                        <!-- Product tags -->
                        <div class="tags">
                                <span class="badge bg-secondary"
                                >Decorative</span
                                >
                            <span class="badge bg-success"
                            >Evergreen</span
                            >
                            <span class="badge bg-info"
                            >Frostproof</span
                            >
                        </div>

                        <!-- Size and temperature -->
                        <p class="mt-3">
                            <strong>120 cm</strong>
                            <small class="text-muted">-15 °C</small>
                        </p>
                        <!-- Price -->
                        <h3 class="mb-4">80,00 €</h3>
                        <!-- Quantity selector -->
                        <div
                            class="selector d-flex align-items-center mb-4 flex-row"
                        >
                            <div class="quantity-selector d-flex">
                                <button
                                    class="btn btn-outline-secondary quantity-minus"
                                    type="button"
                                    data-type="minus"
                                    data-field=""
                                >
                                    -
                                </button>
                                <input
                                    id="quantity"
                                    type="text"
                                    class="form-control text-center"
                                    value="1"
                                    min="1"
                                    max="100"
                                />
                                <button
                                    class="btn btn-outline-secondary quantity-plus"
                                    type="button"
                                    data-type="plus"
                                    data-field=""
                                >
                                    +
                                </button>
                            </div>
                            <button
                                class="shopping-button btn btn-primary"
                            >
                                Add to shopping cart
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                        <!-- Description -->
                        <p>
                            Lorem ipsum dolor sit amet consectetur. In
                            ut mi et varius. Mi nisl turpis id diam.
                            Libero vitae non at mi. Purus tincidunt elit
                            nibh ac accumsan. Nibh ac pretium tellus
                            lectus morbi convallis volutpat posuere. Sed
                            et fermentum sodales elementum in sed
                            sapien.
                        </p>
                        <!-- Additional information could go here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
