<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @vite('resources/css/app.css')
    @vite(['resources/css/templates.css', 'resources/js/app.js', 'resources/css/home.css'])

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Info</title>
</head>
<body>
<div class="relative text-neutral-800 flex flex-col">
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
    <div class="flex flex-col xl:items-center gap-10 xl:gap-20 py-20 px-10 sm:px-20 xl:px-0">
        <div class="flex flex-col xl:flex-row items-center gap-10 xl:gap-[80px]">
            <div class="flex flex-col gap-6 xl:gap-10">
                <h2 class="text-2xl lg:text-3xl xl:text-4xl" id="about">About</h2>
                <p class="xl:w-[460px] text-base xl:text-xl">
                    🌱 At <a href="/" class="hover:text-black">TheUrbanGardener.com</a>, we're passionate about bringing
                    modern gardening solutions right to your
                    fingertips! 🌱<br>
                    Discover top-quality gardening supplies and inspiration to transform your urban space into a green
                    oasis. From tools to plants, we have everything you need to cultivate your own garden sanctuary.
                    Join our community and let's grow together! 🌻🏙️ Visit <a href="/" class="hover:text-black">TheUrbanGardener.com</a>
                    today and start your
                    urban gardening journey.<br>
                    Happy gardening! 🌿✨
                </p>
            </div>
            <img src="{{ asset('assets/img/img-gardening.webp') }}" alt="our shop garden" width="600">
        </div>
        <div class="flex flex-col xl:flex-row items-center gap-10 xl:gap-[80px]">
            <div class="flex flex-col gap-6 xl:gap-10 w-full">
                <h2 class="text-2xl lg:text-3xl xl:text-4xl" id="contact">Contact</h2>
                <div class="flex flex-col gap-6">
                    <p class="xl:w-[460px] text-base xl:text-xl">Feel free to contact us via
                        one of the following methods:
                    </p>
                    <div class="flex flex-col gap-4 text-base xl:text-xl">
                        <a href="mailto:info@theurbangardener.com"
                           class="hover:text-black">info@theurbangardener.com </a>
                        <a href="tel:+421420420420" class="hover:text-black">+421 420 420 420</a>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/img/img-gardening.webp') }}" alt="our shop garden" width="600">
        </div>
        <div class="flex flex-col xl:flex-row items-center gap-10 xl:gap-[80px]">
            <div class="flex flex-col gap-6 xl:gap-10">
                <h2 class="text-2xl lg:text-3xl xl:text-4xl" id="visit">Visit us</h2>
                <p class="xl:w-[460px] text-base xl:text-xl text-balance">🌿 Visit us at our physical address: Adress
                    123, City 420
                    69, Slovakia🏙️<br>Step into our shop and explore our wide selection of plants in person. Immerse
                    yourself in
                    the greenery and discover the perfect additions to your urban garden! 🌱
                </p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26419.81917081952!2d18.036070666674957!3d48.89542316664679!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c87908a85bfc5%3A0x400af0f661d61b0!2sTren%C4%8D%C3%ADn%2C%20Slovakia!5e0!3m2!1sen!2sus!4v1647419173681!5m2!1sen!2sus"
                height="400" allowfullscreen="" loading="lazy" class="w-full xl:w-[600px]">
            </iframe>
        </div>
    </div>
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
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
