<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Plants</title>

    @vite(['resources/css/templates.css', 'resources/css/all-plants.css', 'resources/js/app.js'])
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- NavBar -->
        <header>
            <nav class="navbar navbar-expand-md bg-body-tertiary">
                <div class="container-fluid px-5">

                    <a class="navbar-brand mr-3 p-0" href="{{ route('home.show') }}">
                        <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo" style="height: 50px; width: auto;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto text-center">
                            <li class="nav-item">
                                <a class="nav-link" href="home.html#products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="info-page.html#visit">Visit Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="info-page.html#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="info-page.html#contact">Contact</a>
                            </li>
                            <li class="nav-item d-flex justify-content-center d-md-none" style="gap: .75rem;">
                                <a class="btn btn-outline-dark d-md-inline-block" href="user-login.html">Login</a>
                                <a class="nav-link text-dark" href="shopping-cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
                            </li>
                        </ul>

                        <form class="d-flex mt-3 mt-md-0 form-width" style="gap: .5rem;">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn no-outline" type="submit"><i class="fas fa-search"></i></button>
                            <a class="btn btn-outline-dark d-none d-md-inline-block ms-auto" href="user-login.html">Login</a>
                            <a class="nav-link text-dark d-none d-md-flex align-items-center mx-3" href="shopping-cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
                        </form>
                    </div>
                </div>
            </nav>

        </header>

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
    </div>

            <!-- Footer -->
            <footer class="footer mt-auto py-5">
                <div class="container">
                    <div class="row">
                        <!-- Social media icons -->
                        <div class="footer-col col-12 col-md-6 col-lg-3">
                            <div class="col-container">
                                <div class="mb-2">
                                    <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo" style="height: 50px; width: auto;">
                                </div>
                                <div>© 2024</div>
                                <div class="social-icons">
                                    <a href="#" class="me-2"
                                    ><i class="fab fa-twitter"></i
                                    ></a>
                                    <a href="#" class="me-2"
                                    ><i class="fab fa-facebook-f"></i
                                    ></a>
                                    <a href="#" class="me-2"
                                    ><i class="fab fa-instagram"></i
                                    ></a>
                                    <a href="#" class="me-2"
                                    ><i class="fab fa-linkedin-in"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                        <!-- Footer links -->
                        <div
                            class="footer-col side-col col-12 col-md-6 col-lg-3"
                        >
                            <div class="col-container">
                                <h5>Categories</h5>
                                <ul class="list-unstyled">
                                    <li><a href="home.html#plants">Plants</a></li>
                                    <li><a href="home.html#seeds">Seeds</a></li>
                                    <li><a href="home.html#gardening-tools">Gardening Tools</a></li>
                                    <li><a href="home.html#garden-care">Garden Care</a></li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="footer-col side-col col-12 col-md-6 col-lg-3"
                        >
                            <div class="col-container">
                                <h5>Info</h5>
                                <ul class="list-unstyled">
                                    <li><a href="info-page.html#about">About</a></li>
                                    <li><a href="info-page.html#contact">Contact</a></li>
                                    <li><a href="info-page.html#visit">Visit Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-col col-12 col-md-6 col-lg-3">
                            <div class="col-container">
                                <h5>Contact</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <a
                                            href="mailto:info@theurbangardener.com"
                                        >info@theurbangardener.com</a
                                        >
                                    </li>
                                    <li>
                                        <a href="tel:+421420420420"
                                        >+421 420 420 420</a
                                        >
                                    </li>
                                    <li>Address 123, City 420 69, Slovakia</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
</body>
</html>
