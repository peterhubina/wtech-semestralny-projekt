@extends('components.layout-admin')

@section('title', 'Edit Category')

@section('stylesheets')
<!-- Page-specific styles -->
@vite(['resources/css/add-products.css', 'resources/js/app.js'])
@endsection

@section('content')
<main>
    <!-- Products Form -->
    <div class="container d-flex flex-column align-items-center" id="custom-form">
        <p class="fs-1 text-uppercase">Edit Product</p>

        <form class="text-center" action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT"> 

            <div class="container">
                <div class="row justify-content-center">
                        <div class="category-form">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" value="{{ $product->title }}" name="title">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="description" value="{{ $product->description }}" name="description">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="price" value="{{ $product->price }}" name="price">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="quantity" placeholder="Quantity 1" name="quantity">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="img" value="{{ $product->images->first()->imagePath }}" name="imagePath">
                            </div>
                        </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('storage/'.$product->images->first()->imagePath) }}" class="card-img-top" alt="Product Image">
                    </div>
                </div>
                <button type="submit" class="btn btn-light btn-lg d-block mx-auto edit-button">Save</button>
            </div>
        </form>

    </div>
</main>
@endsection