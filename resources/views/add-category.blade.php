@extends('components.layout-admin')

@section('title', 'Add Category')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite(['resources/css/add-products.css', 'resources/js/app.js'])
@endsection

@section('content')
<main>
    <div class="wrapper">
        <div class="container d-flex flex-column align-items-center" id="custom-form">
            <p class="fs-1 text-uppercase">Add Category</p>

            <form class="category-form">
                <div class="my-5">
                    <input type="text" class="form-control" id="name" placeholder="Category Name">
                </div>
                <button type="submit" class="btn btn-light btn-lg d-block mx-auto submit-button mt-3">Save</button>
            </form>
        </div>
    </div>
</main>
@endsection
