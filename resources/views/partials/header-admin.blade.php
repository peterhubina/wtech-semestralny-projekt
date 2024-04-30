<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <a class="navbar-brand ms-5 text-uppercase fs-4" href="{{ route ('home.show')}}">
            <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo" style="height: 50px; width: auto;">
        </a>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end fs-4" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="{{ route ('mg-products.show')}}">Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="{{ route ('mg-category.show')}}">Manage Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
