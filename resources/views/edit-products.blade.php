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

        <form class="" action="{{ route('product.update', $product->id) }}" method="POST" >
            @csrf
            <input type="hidden" name="_method" value="PUT"> 

            <div class="container">
                <div class="row justify-content-center">
                    <div class="category-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Title</label>
                            <input type="text" class="form-control" id="name" value="{{ $product->title }}" name="title">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="height" class="form-label">Height</label>
                            <input type="text" class="form-control" id="height" value="{{ $product->height }}" name="height">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" value="{{ $product->price }}" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" value="{{ $product->stockQuantity }}" name="stockQuantity">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" id="category" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagePath" class="form-label">Image Link</label>
                            <select class="form-control" id="imagePath" name="imagePath" onchange="updateProductImage()">
                                @foreach($images as $image)
                                    <option value="{{ $image->imagePath }}" {{ ($product->getTitular() && $product->getTitular()->imagePath == $image->imagePath) ? 'selected' : '' }}>
                                        {{ $image->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ $product->getTitular() ? $product->getTitular()->imagePath : '' }}" id="productImage" class="card-img-top titular" alt="Product Image">
                    </div>
                </div>
                <button type="submit" class="btn btn-light btn-lg d-block mx-auto edit-button mb-5">Save</button>
            </div>
        </form>

    </div>

    <script>
        function updateProductImage() {
            var imagePath = document.getElementById('imagePath').value;
            var productImage = document.getElementById('productImage');
            productImage.src = imagePath;
        }
    </script>
</main>
@endsection