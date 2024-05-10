@extends('components.layout')

@section('title', 'Home')

@section('stylesheets')
    @vite('resources/css/home.css')
    @vite('resources/css/app.css')
@endsection

@section('content')
    @if (session('success'))
        <div id="success-popup" class="success-popup">
            {{ session('success') }}
        </div>
    @endif

    @if (session('showModal'))
        @include('cart-modal')
    @endif

    <main class="flex-column">
        <div class="banner">
            <div class="main-wrapper">
                <div class="main-content">
                    <h1 class="h1 mb-5 text-right main-heading">
                        Supply for your garden
                    </h1>
                    <div class="btn-wrapper d-flex justify-content-end">
                        <a class="btn btn-dark" href="{{route('home.show')}}#categories"
                        >Explore categories</a
                        >
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-4 sm:px-10" id="categories">
            @foreach ($categories as $category)
                <section class="container my-4" id="{{ strtolower($category->title) }}">
                    <h2 class="mb-3 text-2xl sm:text-3xl font-medium">{{ $category->title }}</h2>
                    <div class="row">
                        @foreach ($category->products as $product)
                            <div class="col-6 col-md-3 mb-3">
                                <div class="card">
                                    <a href="{{ route('item-details.show', $product) }}">
                                        <img
                                            src="{{ $product->getTitular()->first()->imagePath }}"
                                            class="card-img-top"
                                            alt="{{ $product->getTitular()->first()->altText }}"
                                        />
                                    </a>

                                    <div class="card-body">
                                        <a href="{{ route('item-details.show', $product) }}">
                                            <h5 class="card-title sm:text-lg line-clamp-2 font-medium">{{ $product->title }}</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- More button -->
                        <div class="w-100 text-center mt-3">
                            <a class="btn btn-outline-dark" href="{{ route('all-plants.show', $category) }}">
                                More
                            </a>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
    </main>
@endsection

