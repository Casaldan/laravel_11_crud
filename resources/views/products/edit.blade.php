@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h2 class="card-title mb-4">Edit Product</h2>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $product->code) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="file" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="file" name="file" accept="image/*">
                            <div class="form-text">Leave empty to keep the current image</div>
                            
                            @if($product->file_path)
                                <div class="mt-3">
                                    <p class="mb-2">Current Image:</p>
                                    <div class="current-image-container">
                                        <img src="{{ asset('storage/' . $product->file_path) }}" 
                                             alt="{{ $product->name }}" 
                                             class="img-fluid rounded current-image" 
                                             style="max-height: 200px; width: auto; object-fit: contain;">
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">&larr; Back to Products</a>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .current-image-container {
        background-color: rgba(255, 255, 255, 0.05);
        padding: 1rem;
        border-radius: 0.5rem;
        display: inline-block;
    }
    
    .current-image {
        transition: transform 0.3s ease;
    }
    
    .current-image:hover {
        transform: scale(1.05);
    }
</style>
@endsection