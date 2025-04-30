@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Product Information</span>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold">Code:</label>
                <div class="col-sm-8 pt-2">
                    {{ $product->code }}
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold">Name:</label>
                <div class="col-sm-8 pt-2">
                    {{ $product->name }}
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold">Quantity:</label>
                <div class="col-sm-8 pt-2">
                    {{ $product->quantity }}
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold">Price:</label>
                <div class="col-sm-8 pt-2">
                    {{ number_format($product->price, 2) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label fw-bold">Description:</label>
                <div class="col-sm-8 pt-2">
                    {{ $product->description }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection