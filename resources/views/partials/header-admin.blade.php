<header>
    <nav class="navbar navbar-expand-md bg-body-tertiary">
        <div class="container-fluid px-5">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand p-0" href="{{ route('home.show') }}">
                    <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo" style="height: 50px; width: auto;">
                </a>

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mg-products.show') }}">Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mg-category.show') }}">Manage Categories</a>
                    </li>
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="btn btn-outline-dark ms-auto" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </form>
            </div>
        </div>
    </nav>
</header>
