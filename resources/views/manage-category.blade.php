@extends('components.layout-admin')

@section('title', 'Add Category')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite(['resources/css/manage-products.css', 'resources/js/app.js'])
@endsection

@section('content')
<main>
    <!-- Category Table -->
    <div class="container-fluid d-flex flex-column align-items-center" id="custom-table">
        <div class="table-responsive w-75 category-table">
            <div class="d-flex justify-content-between align-items-center">
                <p class="fs-1 mx-5 mb-0 text-uppercase">Manage Categories</p>
                <div>
                    <a href="{{ route('add-category.show') }}">
                        <button type="button" class="btn btn-lg btn-light me-2 submit-button text-uppercase">Add</button>
                    </a>
                    <button type="button" class="btn btn-lg btn-light submit-button text-uppercase">Save</button>
                </div>
            </div>

            <table class="table table-striped table-hover table-bordered fs-5 mt-4">
                <thead>
                    <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category Image</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><img src="{{ asset('assets/img/plant.webp') }}" class="img-thumbnail" alt="..."></td>
                        <td>Category 1</td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('edit-category.show') }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                <button type="button" class="btn btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><img src="{{ asset('assets/img/plant.webp') }}" class="img-thumbnail" alt="..."></td>
                        <td>Category 2</td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('edit-category.show') }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                <button type="button" class="btn btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><img src="{{ asset('assets/img/plant.webp') }}" class="img-thumbnail" alt="..."></td>
                        <td>Category 3</td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('edit-category.show') }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                <button type="button" class="btn btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><img src="{{ asset('assets/img/plant.webp') }}" class="img-thumbnail" alt="..."></td>
                        <td>Category 4</td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('edit-category.show') }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                <button type="button" class="btn btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <nav class="d-flex justify-content-center mb-5">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link text-dark" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link text-dark" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</main>
@endsection