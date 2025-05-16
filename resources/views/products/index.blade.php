@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold mb-0">Product List</h3>
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i> Add New Product
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0 bg-white">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 5%">S#</th>
                                    <th style="width: 10%">Image</th>
                                    <th style="width: 10%">Code</th>
                                    <th>Name</th>
                                    <th style="width: 10%">Quantity</th>
                                    <th style="width: 15%">Price</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($product->file_path)
                                                <img src="{{ asset('storage/' . $product->file_path) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 60px; max-height: 60px; object-fit: cover;">
                                            @else
                                                <span class="d-inline-block bg-secondary bg-opacity-10 rounded" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>₱{{ number_format($product->price, 2) }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('products.show', $product) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="bi bi-box-seam display-5 text-muted"></i>
                                            <div class="mt-2">No products found.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection