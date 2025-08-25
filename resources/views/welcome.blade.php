@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-start gap-3 my-3">
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">
                <i class="bi bi-plus-circle"></i> Create Category
            </a>
            <a href="{{ route('products.create') }}" class="btn btn-outline-success">
                <i class="bi bi-plus-circle"></i> Create Product
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        {{-- Categories Table --}}
        <div class="card mb-5">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Categories</h5>
            </div>
            <div class="card-body p-0">
                @if ($categories->count())
                    <table class="table table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                                <tr>
                                    <td>{{ $cat->title }}</td>
                                    <td>{{ $cat->description }}</td>
                                    <td>
                                        <span class="badge {{ $cat->status == '1' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $cat->status == '1' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this category?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-3">No Categories Found</div>
                @endif
            </div>
        </div>

        {{-- Products Table --}}
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Products</h5>
            </div>
            <div class="card-body p-0">
                @if ($products->count())
                    <table class="table table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>In Stock</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $pro)
                                <tr>
                                    <td>{{ $pro->category->title }}</td>
                                    <td>{{ $pro->title }}</td>
                                    <td>{{ $pro->slug }}</td>
                                    <td>{{ $pro->description }}</td>
                                    <td>{{ $pro->quantity }}</td>
                                    <td>Rs {{ number_format($pro->price, 2) }}</td>
                                    <td>{{ $pro->in_stock }}</td>
                                    <td>
                                        <span class="badge {{ $pro->status == '1' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $pro->status == '1' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('products.edit', $pro->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $pro->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this product?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-3">No Products Found</div>
                @endif
            </div>
        </div>
    </div>
@endsection
