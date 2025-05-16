@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        @if($product->file_path)
                            <div class="product-image-container mb-4">
                                <img src="{{ asset('storage/' . $product->file_path) }}" 
                                     alt="{{ $product->name }}" 
                                     class="img-fluid rounded product-image" 
                                     style="max-height: 300px; width: auto; object-fit: contain;">
                            </div>
                        @else
                            <div class="placeholder-image mb-4">
                                <i class="bi bi-image text-muted" style="font-size: 6rem;"></i>
                            </div>
                        @endif
                        <h2 class="card-title">{{ $product->name }}</h2>
                        <p class="text-muted">Code: <span class="fw-semibold">{{ $product->code }}</span></p>
                    </div>
                    
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Quantity:</span>
                            <span>{{ $product->quantity }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Price:</span>
                            <span class="text-success fw-bold">₱{{ number_format($product->price, 2) }}</span>
                        </div>
                        <div>
                            <p class="fw-semibold mb-1">Description:</p>
                            <p class="text-muted">{{ $product->description }}</p>
                        </div>
                    </div>
                    
                    <div class="text-end">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">&larr; Back to Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .product-image-container {
        background-color: rgba(255, 255, 255, 0.05);
        padding: 1rem;
        border-radius: 0.5rem;
    }
    
    .product-image {
        transition: transform 0.3s ease;
    }
    
    .product-image:hover {
        transform: scale(1.05);
    }
    
    .placeholder-image {
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(255, 255, 255, 0.05);
        border-radius: 0.5rem;
    }
</style>
@endsection