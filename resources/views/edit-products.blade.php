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

        <form class="category-form w-50" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT"> 

            <div class="container">
                <div class="row justify-content-center">
                    <div >
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
                            <label for="title-image" class="form-label">Upload Title Image</label>
                            <input type="file" class="form-control" id="title-image" name="title-image">
                        </div>
                        <div class="mb-3">
                            <label for="sec-image" class="form-label">Upload Secondary Images</label>
                            <input type="file" class="form-control" id="sec-image" name="sec-image[]" multiple>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-light btn-lg d-block mx-auto edit-button mt-3 mb-5">Save</button>
             </div>
        </form>
    </div>
</main>
@endsection