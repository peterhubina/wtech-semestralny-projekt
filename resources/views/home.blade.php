@extends('components.layout')

@section('title', 'Home')

@section('stylesheets')
    @vite('resources/css/home.css')
@endsection

@section('content')
    <main class="flex-column">
        <div class="banner">
            <div class="main-wrapper">
                <div class="main-content">
                    <h1 class="h1 mb-5 text-right main-heading">
                        Supply for your garden
                    </h1>
                    <div class="btn-wrapper d-flex justify-content-end">
                        <a class="btn btn-dark" href="#products"
                        >Explore categories</a
                        >
                    </div>
                </div>
            </div>
        </div>

        @foreach ($categories as $category)
            <section class="container my-4" id="category-{{ $category->id }}">
                <h2 class="mb-3">{{ $category->title }}</h2>
                <div class="row">
                    @foreach ($category->products as $product)
                        <div class="col-6 col-md-3 mb-3">
                            <div class="card">
                                <a href="{{ route('item-details.show', $product) }}">
                                    <img
                                        src="{{ asset('assets/img/' . $product->images->first()->imagePath) }}"
                                        class="card-img-top"
                                        alt="{{ $product->images->first()->altText }}"
                                    />
                                </a>

                                <div class="card-body">
                                    <a href="{{ route('item-details.show', $product) }}">
                                        <h5 class="card-title">{{ $product->title }}</h5>
                                    </a>
                                    <!-- Include other product info if needed -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- More button -->
                    <div class="w-100 text-center mt-3">
                        <a class="btn btn-outline-primary" href="{{ route('all-plants.show', $category) }}">
                            More
                        </a>
                    </div>
                </div>
            </section>
        @endforeach


    </main>
@endsection

