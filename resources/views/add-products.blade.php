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
        <p class="fs-1 text-uppercase">Add Product</p>

        <form class="category-form">
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" id="name" placeholder="Product Name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="description" placeholder="Description">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="price" placeholder="Price">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="quantity" placeholder="Quantity">
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" id="category-image" placeholder="Image Link">
            </div>
            <button type="submit" class="btn btn-light btn-lg d-block mx-auto submit-button">Save</button>
        </form>
    </div>
</main>
@endsection