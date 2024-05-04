@extends('components.layout-admin')

@section('title', 'Add Category')

@section('stylesheets')
    <!-- Page-specific styles -->
    @vite(['resources/css/manage-products.css', 'resources/js/app.js'])
@endsection

@section('content')
<main>
    <!-- Category Table -->
    <div class="container-fluid d-flex flex-column align-items-center mt-5" id="custom-table">
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
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->title }}</td>
                        <td>
                            <div class="d-flex flex-column align-items-center">
                                <a href="{{ route('edit-category.show', $category) }}" class="w-50">
                                    <button type="button"
                                        class="btn btn-sm btn-light mb-2 w-100 submit-button">Edit</button>
                                </a>
                                <a href="" class="w-50">
                                    <button type="button" class="btn btn-light w-100 submit-button">Delete</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($categories->lastPage() > 1)
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ ($categories->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $categories->url(1) }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $categories->lastPage(); $i++)
                        <li class="page-item {{ ($categories->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ ($categories->currentPage() == $categories->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $categories->url($categories->currentPage()+1) }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
</main>
@endsection