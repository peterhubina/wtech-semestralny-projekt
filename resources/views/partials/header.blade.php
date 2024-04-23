<header>
    <nav class="navbar navbar-expand-md bg-body-tertiary">
        <div class="container-fluid px-5">

            <a class="navbar-brand mr-3 p-0" href="{{ route ('home.show')}}">
                <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo" style="height: 50px; width: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route ('home.show')}}#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route ('info-page.show')}}#visit">Visit Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route ('info-page.show')}}#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route ('info-page.show')}}#contact">Contact</a>
                    </li>
                    <li class="nav-item d-flex justify-content-center d-md-none" style="gap: .75rem;">
                        @auth
                            <a class="btn btn-outline-dark d-md-inline-block" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        @else
                            <a class="btn btn-outline-dark d-md-inline-block" href="{{ route('login') }}">Login</a>
                        @endguest
                        <a class="nav-link text-dark" href="{{ route ('shopping-cart.show')}}"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                </ul>

                <form class="d-flex mt-3 mt-md-0 form-width" style="gap: .5rem;">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn no-outline" type="submit"><i class="fas fa-search"></i></button>
                    @auth
                        <a class="btn btn-outline-dark d-none d-md-inline-block ms-auto" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    @else
                        <a class="btn btn-outline-dark d-none d-md-inline-block ms-auto" href="{{ route('login') }}">Login</a>
                    @endguest
                    <a class="nav-link text-dark d-none d-md-flex align-items-center mx-3" href="{{ route ('shopping-cart.show')}}"><i class="fa-solid fa-cart-shopping"></i></a>
                </form>
            </div>
        </div>
    </nav>
    @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</header>
