@extends('components.layout-admin')

@section('title', 'Manage Products')

@section('stylesheets')
<!-- Page-specific styles -->
@vite(['resources/css/manage-products.css', 'resources/js/app.js'])
@endsection

@section('content')
<main>
    <!-- Products Table -->
    <div class="container-fluid d-flex flex-column align-items-center" id="custom-table">
        <div class="table-responsive w-75 products-table">
            <div class="d-flex justify-content-between align-items-center">
                <p class="fs-1 mx-5 mb-0 text-uppercase">Manage Products</p>
                <div>
                    <a href="{{ route('add-products.show') }}">
                        <button type="button" class="btn btn-lg btn-light me-2 submit-button text-uppercase">Add</button>
                    </a>
                    <button type="button" class="btn btn-lg btn-light text-uppercase submit-button">Save</button>
                </div>
            </div>

            <table class="table table-striped table-hover table-bordered fs-5 mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Flower 1</td>
                        <td>Lorem Ipsum</td>
                        <td>33.00/stalk</td>
                        <td>1</td>
                        <td><img src="{{ asset('assets/img/plant.webp') }}" class="img-thumbnail" alt="..."></td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('edit-products.show') }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                
                                <button type="button" class="btn btn-sm btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Flower 2</td>
                        <td>Lorem Ipsum</td>
                        <td>33.00/stalk</td>
                        <td>1</td>
                        <td><img src="{{ asset('assets/img/plant.webp') }}" class="img-thumbnail" alt="..."></td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('edit-products.show') }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                <button type="button" class="btn btn-sm btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Flower 3</td>
                        <td>Lorem Ipsum</td>
                        <td>33.00/stalk</td>
                        <td>1</td>
                        <td><img src="{{ asset('assets/img/plant.webp') }}" class="img-thumbnail" alt="..."></td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('edit-products.show') }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                <button type="button" class="btn btn-sm btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Flower 4</td>
                        <td>Lorem Ipsum</td>
                        <td>33.00/stalk</td>
                        <td>1</td>
                        <td><img src="{{ asset('assets/img/plant.webp') }}" class="img-thumbnail" alt="..."></td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('edit-products.show') }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                <button type="button" class="btn btn-sm btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Flower 5</td>
                        <td>Lorem Ipsum</td>
                        <td>33.00/stalk</td>
                        <td>1</td>
                        <td><img src="{{ asset('assets/img/plant.webp') }}" class="img-thumbnail" alt="..."></td>
                        <td>
                            <div class="d-flex flex-column align-items-start">
                                <a href="{{ route('edit-products.show') }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                <button type="button" class="btn btn-sm btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation" class="d-flex justify-content-center mb-5">
            <ul class="pagination">
                <li class="page-item">
                <a class="page-link text-dark" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
                <li class="page-item active"><a class="page-link text-dark" href="#">1</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                <li class="page-item disabled"><span class="page-link text-dark">...</span></li>
                <li class="page-item"><a class="page-link text-dark" href="#">10</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">11</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">12</a></li>
                <li class="page-item">
                <a class="page-link text-dark" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
        </nav>
</main>
@endsection