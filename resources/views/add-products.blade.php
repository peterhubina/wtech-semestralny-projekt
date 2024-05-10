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

        <form class="category-form" action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="category-form">
                        <div class="mb-3 mt-3">
                            <input type="text" class="form-control" id="name" placeholder="Product Name" name="title">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="text" class="form-control" id="height" placeholder="Height" name="height">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="description" placeholder="Description" name="description">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="price" placeholder="Price" name="price">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="country" placeholder="Country" name="country">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="stockQuantity">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="type" placeholder="Type" name="type">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" id="category" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
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
                <button type="submit" class="btn btn-light btn-lg d-block mx-auto submit-button mt-2 mb-5 w-25">Save</button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
