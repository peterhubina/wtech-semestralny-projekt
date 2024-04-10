<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @vite('resources/css/app.css')
    @vite(['resources/css/templates.css', 'resources/js/app.js'])

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Shopping Cart</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md bg-body-tertiary">
        <div class="container-fluid px-5">

            <a class="navbar-brand mr-3 p-0" href="{{ route('home.show') }}">
                <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo" style="height: 50px; width: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.show') }}#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('info-page.show') }}#visit">Visit Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('info-page.show') }}#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('info-page.show') }}#contact">Contact</a>
                    </li>
                    <li class="nav-item d-flex justify-content-center d-md-none" style="gap: .75rem;">
                        <a class="btn btn-outline-dark d-md-inline-block" href="{{ route('user-login.show') }}">Login</a>
                        <a class="nav-link text-dark" href="{{ route('shopping-cart.show') }}"><i
                                class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                </ul>

                <form class="d-flex mt-3 mt-md-0 form-width" style="gap: .5rem;">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn no-outline" type="submit"><i class="fas fa-search"></i></button>
                    <a class="btn btn-outline-dark d-none d-md-inline-block ms-auto"
                       href="{{ route('user-login.show') }}">Login</a>
                    <a class="nav-link text-dark d-none d-md-flex align-items-center mx-3"
                       href="{{ route('shopping-cart.show') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                </form>
            </div>
        </div>
    </nav>
</header>
<main class="flex flex-col items-center py-10 px-6">
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
                        class="flex gap-4 sm:flex-row items-end xl:items-center justify-between xl:justify-end w-full">
                        <div
                            class="order-1 xl:order-none flex flex-col sm:flex-row xl:flex-col gap-4 items-end sm:items-center">
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
                        class="flex gap-4 sm:flex-row items-end xl:items-center justify-between xl:justify-end w-full">
                        <div
                            class="order-1 xl:order-none flex flex-col sm:flex-row xl:flex-col gap-4 items-end sm:items-center">
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
                        class="flex gap-4 sm:flex-row items-end xl:items-center justify-between xl:justify-end w-full">
                        <div
                            class="order-1 xl:order-none flex flex-col sm:flex-row xl:flex-col gap-4 items-end sm:items-center">
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
            <a href="checkout.blade.php"
               class="flex items-center justify-center bg-black text-white w-full h-14 rounded-xl text-lg hover:no-underline hover:bg-neutral-800">Continue
                to checkout</a>
        </div>
    </div>
</main>
<footer class="footer mt-auto py-5">
    <div class="container">
        <div class="row">
            <!-- Social media icons -->
            <div class="footer-col col-12 col-md-6 col-lg-3">
                <div class="col-container">
                    <div class="mb-2 flex justify-center">
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
                        <li><a href="info-page.blade.php#about">About</a></li>
                        <li><a href="info-page.blade.php#contact">Contact</a></li>
                        <li><a href="info-page.blade.php#visit">Visit Us</a></li>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
