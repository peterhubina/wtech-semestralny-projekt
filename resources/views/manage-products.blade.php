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
        <div class="table-responsive products-table">
            <div class="d-flex justify-content-between align-items-center">
                <p class="fs-1 mx-5 mb-0 text-uppercase">Manage Products</p>
                <div>
                    <a href="{{ route('add-products.show') }}">
                        <button type="button" class="btn btn-lg btn-light me-2 submit-button text-uppercase">Add</button>
                    </a>
                    <button type="button" class="btn btn-lg btn-light text-uppercase submit-button">Save</button>
                </div>
            </div>

            <table class="table table-striped table-hover table-bordered fs-5 mt-4" id='custom-table'>
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
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>1</td>
                        <td><img src="{{ asset('storage/'.$product->images->first()->imagePath) }}" class="img-thumbnail" alt="..."></td>
                        <td>
                            <div class="d-flex flex-column align-items-start mt-3">
                                <a href="{{ route('edit-products.show', $product) }}" class="w-100">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                               
                                <button type="button" class="btn btn-sm btn-light w-100 submit-button">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                
            </table>
        </div>

        @if ($products->lastPage() > 1)
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $products->url(1) }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="page-item {{ ($products->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $products->url($products->currentPage()+1) }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
</main>
@endsection