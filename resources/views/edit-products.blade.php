@extends('components.layout-admin')

@section('title', 'Add Category')

@section('stylesheets')
<!-- Page-specific styles -->
@vite(['resources/css/add-products.css', 'resources/js/app.js'])
@endsection

@section('content')
<main>
    <!-- Products Form -->
    <div class="container d-flex flex-column align-items-center" id="custom-form">
        <p class="fs-1 text-uppercase">Edit Product</p>

        <form class="category-form row">
            <div class="col">
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" id="name" placeholder="Product 1">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="description" placeholder="Description 1">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="price" placeholder="Price 1">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="quantity" placeholder="Quantity 1">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="img" placeholder="Img 1">
                </div>
            </div>
            <div class="col mb-4">
                <img src="{{ asset('assets/img/plant.webp') }}" class="card-img-top" alt="...">
            </div>

        </form>
        <button type="submit" class="btn btn-light btn-lg d-block mx-auto edit-button">Save</button>
    </div>
</main>
@endsection