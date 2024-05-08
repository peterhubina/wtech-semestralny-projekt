@extends('components.layout')

@section('title', 'All Plants')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite(['resources/css/all-plants.css', 'resources/js/counter.js'])
@endsection

@section('content')
@if (session('cart-message'))
    <div id="cart-popup" class="cart-popup">
        {{ session('cart-message') }}
    </div>
@endif
<main>
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Offcanvas Filter -->
            <div class="col-2" id="plants-filter">
                <button class="btn btn-light sticky-top mt-5" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                    <i class="fa-solid fa-arrow-down-wide-short"></i>
                </button>

                <form id="filterForm" method="GET">
                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title mt-1" id="offcanvasScrollingLabel">Filter</h5>
                            <button type="button" class="btn-close align-items-center" data-bs-dismiss="offcanvas"><i class="fa-solid fa-arrow-down-wide-short"></i></button>
                        </div>
                        <div class="offcanvas-body">
                            <!-- Price Range -->
                            <div class="mb-3">
                                <label for="price-range" class="form-label">Price range</label>
                                <input type="range" class="form-range" id="price-range" name="max_price" min="0" max="1000" value="{{ request('max_price', 1000) }}" oninput="priceRangeValue.value = priceRange.value">
                                <div class="d-flex justify-content-between align-items-center mb-1 mt-2">
                                    <div class="col-4 p-0">
                                        <input type="text" class="form-control mb-3" id="price-form" name="max_price_display" placeholder="Max price" value="{{ request('max_price', 1000) }}" oninput="updateRangeValue(this.value)">
                                    </div>
                                </div>
                            </div>

                            <!-- Price order filter options -->
                            <div class="mb-3">
                                <p class="mb-1">Price Order</p>
                                <input type="radio" name="price_order" value="cheapest" id="cheapest" {{ request('price_order') == 'cheapest' ? 'checked' : '' }}>
                                <label for="cheapest">Cheapest First</label><br>
                                <input type="radio" name="price_order" value="expensive" id="expensive" {{ request('price_order') == 'expensive' ? 'checked' : '' }}>
                                <label for="expensive">Most Expensive First</label>
                            </div>

                            <!-- Country filter options -->
                            <div class="mb-3">
                                <p class="mb-1">Country</p>
                                @foreach($countries as $country)
                                    <input type="checkbox" name="country[]" value="{{ $country }}" id="country_{{ $country }}" {{ in_array($country, request('country', [])) ? 'checked' : '' }}>
                                    <label for="country_{{ $country }}">{{ $country }}</label><br>
                                @endforeach
                            </div>

                            <!-- Type filter options -->
                            <div class="mb-3">
                                <p class="mb-1">Type</p>
                                <input type="checkbox" name="type[]" value="Indoor" id="type_indoor" {{ in_array('Indoor', request('type', [])) ? 'checked' : '' }}>
                                <label for="type_indoor">Indoor</label><br>

                                <input type="checkbox" name="type[]" value="Outdoor" id="type_outdoor" {{ in_array('Outdoor', request('type', [])) ? 'checked' : '' }}>
                                <label for="type_outdoor">Outdoor</label>
                            </div>

                            <!-- Apply Filters Button -->
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Products List -->
            <div class="col-10 col-md-8 col-lg-8 mt-4 mb-5" id="main-content">
                <div class="container-fluid">
                    <div class="row">
                        @if($products->isEmpty())
                            <div class="col-12">
                                <div class="alert alert-info" role="alert">
                                    No products found for the searched query.
                                </div>
                            </div>
                        @else
                            @foreach($products as $product)
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3 d-flex">
                                <div class="card plants-card">
                                    @if($product->images->isNotEmpty())
                                        <a href="{{ route('item-details.show', $product) }}">
                                            <img
                                                src="{{ $product->getTitular()->first()->imagePath }}"
                                                class="card-img-top"
                                                alt="{{ $product->getTitular()->first()->altText }}"
                                            />
                                        </a>
                                    @else
                                        <img src="{{ asset('assets/img/no-image-available.png') }}" class="card-img-top" alt="No image available">
                                    @endif

                                    <div class="card-body px-4 d-flex flex-column">
                                    <a href="{{ route('item-details.show', $product) }}" class="title-link text-decoration-none text-black"><h5 class="card-title ellipsis-title mt-4 mb-2">{{ $product->title }}</h5></a>
                                        <div class="d-flex justify-content-between mb-2 info">
                                            <p class="card-text mb-0 text-muted">{{ $product->height }} cm</p>
                                            <p class="card-text mb-0">{{ number_format($product->price, 2, ',', '.') }} €</p>
                                        </div>

                                        <form class="product-row d-flex justify-content-between align-items-center mt-auto" method="POST" action="{{ route('shopping-cart.add', $product) }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="col-5 p-0">
                                                <input type="number" id="quantity" name="quantity" class="form-control quantity-input" placeholder="1" value="1" min="1">
                                            </div>

                                            <div class="incrementer col-2">
                                                <button type="button" class="sort btn btn-white align-items-center border-0 quantity-plus">
                                                    <i class="fa-solid fa-sort-up fas"></i>
                                                </button>
                                                <button type="button" class="sort btn btn-white align-items-center border-0 quantity-minus">
                                                    <i class="fa-solid fa-sort-down fas"></i>
                                                </button>
                                            </div>
                                            <button type="submit" class="col-4 btn btn-sm btn-dark submit-button">
                                                <i class="fa-solid fa-cart-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif

                        @if ($products->lastPage() > 1)
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ ($products->currentPage() == 1) ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $products->url(1) . '&' . http_build_query(request()->except('page')) }}" aria-label="Previous">
                                            <i class="fa-solid fa-caret-left fas"></i>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item {{ ($products->currentPage() == $i) ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) . '&' . http_build_query(request()->except('page')) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ ($products->currentPage() == $products->lastPage()) ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $products->url($products->currentPage()+1) . '&' . http_build_query(request()->except('page')) }}" aria-label="Next">
                                            <i class="fa-solid fa-caret-right fas"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>


</main>

<script>
    // Update range value based on text input
    function updateRangeValue(value) {
        var priceRange = document.getElementById('price-range');
        var priceForm = document.getElementById('price-form');

        value = Math.max(priceRange.min, Math.min(value, priceRange.max));

        priceRange.value = value;
        priceForm.value = value;
    }

    // Synchronize the range input with the text input
    document.getElementById('price-range').addEventListener('input', function() {
        document.getElementById('price-form').value = this.value;
    });
    document.getElementById('price-form').addEventListener('input', function() {
        updateRangeValue(this.value);
    });

    document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('filterForm');
    const category = window.location.pathname.split('/')[2];

    if (category) {
        form.action = `/all-plants/${category}`;
        form.querySelector('input[name="category"]').value = category;
    }
});
</script>
@endsection
