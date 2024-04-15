@extends('components.layout')

@section('title', 'All Plants')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite(['resources/css/all-plants.css', 'resources/js/app.js'])
@endsection

@section('content')
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

                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title mt-1" id="offcanvasScrollingLabel">Filter</h5>
                        <button type="button" class="btn-close align-items-center" data-bs-dismiss="offcanvas"><i
                                class="fa-solid fa-arrow-down-wide-short"></i></button>
                    </div>
                    <div class="offcanvas-body">
                        <!-- Price Range -->
                        <div class="mb-3">
                            <label for="price-range" class="form-label">Price range</label>
                            <input type="range" class="form-range" id="price-range" min="0" max="100" value="50"
                                oninput="priceRangeValue.value = priceRange.value">
                            <form class="d-flex justify-content-between align-items-center mb-1 mt-2">
                                <div class="col-4 p-0">
                                    <input type="text" class="form-control mb-3" id="price-form" placeholder="50">
                                </div>
                            </form>
                        </div>

                        <!-- Price order filter options -->
                        <div class="mb-3">
                            <p class="mb-1">Price Order</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="cheapest" id="cheapest">
                                <label class="form-check-label" for="cheapest">
                                    Cheapest First
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="expensive" id="expensive">
                                <label class="form-check-label" for="expensive">
                                    Most Expensive First
                                </label>
                            </div>
                        </div>

                        <!-- Country filter options -->
                        <div class="mb-3">
                            <p class="mb-1">Country</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="country1">
                                <label class="form-check-label" for="country1">
                                    Country 1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="country2">
                                <label class="form-check-label" for="country2">
                                    Country 2
                                </label>
                            </div>
                        </div>

                        <!-- Type filter options -->
                        <div class="mb-3">
                            <p class="mb-1">Type</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="type1">
                                <label class="form-check-label" for="type1">
                                    Type 1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="type2">
                                <label class="form-check-label" for="type2">
                                    Type 2
                                </label>
                            </div>
                        </div>

                        <!-- Setting filter options -->
                        <div class="mb-3">
                            <p class="mb-1">Setting</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Indoor" id="indoor">
                                <label class="form-check-label" for="indoor">
                                    Indoor
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Outdoor" id="outdoor">
                                <label class="form-check-label" for="outdoor">
                                    Outdoor
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products List -->
            <div class="col-10 col-md-8 col-lg-8 mt-4" id="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Card Rows -->
                        <div class="col-12 col-md-4 col-lg-3 mb-3">
                            <div class="card plants-card">
                                <!-- Card Image -->
                                <img src="{{ asset('assets/img/plant.webp') }}" class="card-img-top" alt="...">
                                <!-- Card Body -->
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-4 mb-2">Cupressus sempervirens Stricta (Italian cypress
                                        tree)
                                    </h5>
                                    <div class="d-flex justify-content-between mb-2 info">
                                        <p class="card-text mb-0 text-muted">120 cm</p>
                                        <p class="card-text mb-0">80,00 €</p>
                                    </div>
                                    <!-- Product Form -->
                                    <form class="product-row d-flex justify-content-between align-items-center">
                                        <div class="col-5 p-0">
                                            <input type="number" class="form-control" placeholder="1">
                                        </div>
                                        <div class="col-2">
                                            <button class="sort btn btn-white align-items-center p-0 m-0">
                                                <i class="fa-solid fa-sort-up fa-xs"></i>
                                            </button>
                                            <button class="sort btn btn-white align-items-center p-0">
                                                <i class="fa-solid fa-sort-down fa-xs"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="col-4 btn btn-sm btn-dark submit-button">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-3">
                            <div class="card plants-card">
                                <!-- Card Image -->
                                <img src="{{ asset('assets/img/plant.webp') }}" class="card-img-top" alt="...">
                                <!-- Card Body -->
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-4 mb-2">Cupressus sempervirens Stricta (Italian cypress
                                        tree)
                                    </h5>
                                    <div class="d-flex justify-content-between mb-2 info">
                                        <p class="card-text mb-0 text-muted">120 cm</p>
                                        <p class="card-text mb-0">80,00 €</p>
                                    </div>
                                    <!-- Product Form -->
                                    <form class="product-row d-flex justify-content-between align-items-center">
                                        <div class="col-5 p-0">
                                            <input type="number" class="form-control" placeholder="1">
                                        </div>
                                        <div class="col-2">
                                            <button class="sort btn btn-white align-items-center p-0 m-0">
                                                <i class="fa-solid fa-sort-up fa-xs"></i>
                                            </button>
                                            <button class="sort btn btn-white align-items-center p-0">
                                                <i class="fa-solid fa-sort-down fa-xs"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="col-4 btn btn-sm btn-dark submit-button">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-3">
                            <div class="card plants-card">
                                <!-- Card Image -->
                                <img src="{{ asset('assets/img/plant.webp') }}" class="card-img-top" alt="...">
                                <!-- Card Body -->
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-4 mb-2">Cupressus sempervirens Stricta (Italian cypress
                                        tree)
                                    </h5>
                                    <div class="d-flex justify-content-between mb-2 info">
                                        <p class="card-text mb-0 text-muted">120 cm</p>
                                        <p class="card-text mb-0">80,00 €</p>
                                    </div>
                                    <!-- Product Form -->
                                    <form class="product-row d-flex justify-content-between align-items-center">
                                        <div class="col-5 p-0">
                                            <input type="number" class="form-control" placeholder="1">
                                        </div>
                                        <div class="col-2">
                                            <button class="sort btn btn-white align-items-center p-0 m-0">
                                                <i class="fa-solid fa-sort-up fa-xs"></i>
                                            </button>
                                            <button class="sort btn btn-white align-items-center p-0">
                                                <i class="fa-solid fa-sort-down fa-xs"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="col-4 btn btn-sm btn-dark submit-button">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-3">
                            <div class="card plants-card">
                                <!-- Card Image -->
                                <img src="{{ asset('assets/img/plant.webp') }}" class="card-img-top" alt="...">
                                <!-- Card Body -->
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-4 mb-2">Cupressus sempervirens Stricta (Italian cypress
                                        tree)
                                    </h5>
                                    <div class="d-flex justify-content-between mb-2 info">
                                        <p class="card-text mb-0 text-muted">120 cm</p>
                                        <p class="card-text mb-0">80,00 €</p>
                                    </div>
                                    <!-- Product Form -->
                                    <form class="product-row d-flex justify-content-between align-items-center">
                                        <div class="col-5 p-0">
                                            <input type="number" class="form-control" placeholder="1">
                                        </div>
                                        <div class="col-2">
                                            <button class="sort btn btn-white align-items-center p-0 m-0">
                                                <i class="fa-solid fa-sort-up fa-xs"></i>
                                            </button>
                                            <button class="sort btn btn-white align-items-center p-0">
                                                <i class="fa-solid fa-sort-down fa-xs"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="col-4 btn btn-sm btn-dark submit-button">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-3">
                            <div class="card plants-card">
                                <!-- Card Image -->
                                <img src="{{ asset('assets/img/plant.webp') }}" class="card-img-top" alt="...">
                                <!-- Card Body -->
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-4 mb-2">Cupressus sempervirens Stricta (Italian cypress
                                        tree)
                                    </h5>
                                    <div class="d-flex justify-content-between mb-2 info">
                                        <p class="card-text mb-0 text-muted">120 cm</p>
                                        <p class="card-text mb-0">80,00 €</p>
                                    </div>
                                    <!-- Product Form -->
                                    <form class="product-row d-flex justify-content-between align-items-center">
                                        <div class="col-5 p-0">
                                            <input type="number" class="form-control" placeholder="1">
                                        </div>
                                        <div class="col-2">
                                            <button class="sort btn btn-white align-items-center p-0 m-0">
                                                <i class="fa-solid fa-sort-up fa-xs"></i>
                                            </button>
                                            <button class="sort btn btn-white align-items-center p-0">
                                                <i class="fa-solid fa-sort-down fa-xs"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="col-4 btn btn-sm btn-dark submit-button">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-3">
                            <div class="card plants-card">
                                <!-- Card Image -->
                                <img src="{{ asset('assets/img/plant.webp') }}" class="card-img-top" alt="...">
                                <!-- Card Body -->
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-4 mb-2">Cupressus sempervirens Stricta (Italian cypress
                                        tree)
                                    </h5>
                                    <div class="d-flex justify-content-between mb-2 info">
                                        <p class="card-text mb-0 text-muted">120 cm</p>
                                        <p class="card-text mb-0">80,00 €</p>
                                    </div>
                                    <!-- Product Form -->
                                    <form class="product-row d-flex justify-content-between align-items-center">
                                        <div class="col-5 p-0">
                                            <input type="number" class="form-control" placeholder="1">
                                        </div>
                                        <div class="col-2">
                                            <button class="sort btn btn-white align-items-center p-0 m-0">
                                                <i class="fa-solid fa-sort-up fa-xs"></i>
                                            </button>
                                            <button class="sort btn btn-white align-items-center p-0">
                                                <i class="fa-solid fa-sort-down fa-xs"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="col-4 btn btn-sm btn-dark submit-button">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-3">
                            <div class="card plants-card">
                                <!-- Card Image -->
                                <img src="{{ asset('assets/img/plant.webp') }}" class="card-img-top" alt="...">
                                <!-- Card Body -->
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-4 mb-2">Cupressus sempervirens Stricta (Italian cypress
                                        tree)
                                    </h5>
                                    <div class="d-flex justify-content-between mb-2 info">
                                        <p class="card-text mb-0 text-muted">120 cm</p>
                                        <p class="card-text mb-0">80,00 €</p>
                                    </div>
                                    <!-- Product Form -->
                                    <form class="product-row d-flex justify-content-between align-items-center">
                                        <div class="col-5 p-0">
                                            <input type="number" class="form-control" placeholder="1">
                                        </div>
                                        <div class="col-2">
                                            <button class="sort btn btn-white align-items-center p-0 m-0">
                                                <i class="fa-solid fa-sort-up fa-xs"></i>
                                            </button>
                                            <button class="sort btn btn-white align-items-center p-0">
                                                <i class="fa-solid fa-sort-down fa-xs"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="col-4 btn btn-sm btn-dark submit-button">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-3">
                            <div class="card plants-card">
                                <!-- Card Image -->
                                <img src="{{ asset('assets/img/plant.webp') }}" class="card-img-top" alt="...">
                                <!-- Card Body -->
                                <div class="card-body px-4">
                                    <h5 class="card-title mt-4 mb-2">Cupressus sempervirens Stricta (Italian cypress
                                        tree)
                                    </h5>
                                    <div class="d-flex justify-content-between mb-2 info">
                                        <p class="card-text mb-0 text-muted">120 cm</p>
                                        <p class="card-text mb-0">80,00 €</p>
                                    </div>
                                    <!-- Product Form -->
                                    <form class="product-row d-flex justify-content-between align-items-center">
                                        <div class="col-5 p-0">
                                            <input type="number" class="form-control" placeholder="1">
                                        </div>
                                        <div class="col-2">
                                            <button class="sort btn btn-white align-items-center p-0 m-0">
                                                <i class="fa-solid fa-sort-up fa-xs"></i>
                                            </button>
                                            <button class="sort btn btn-white align-items-center p-0">
                                                <i class="fa-solid fa-sort-down fa-xs"></i>
                                            </button>
                                        </div>
                                        <button type="submit" class="col-4 btn btn-sm btn-dark submit-button">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <nav class="d-flex justify-content-center mb-5">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link text-dark" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                                <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                                <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link text-dark" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
