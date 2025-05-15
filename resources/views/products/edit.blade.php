@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10 px-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Product</h2>
            <a href="{{ route('products.index') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold shadow hover:bg-indigo-700 transition">&larr; Back</a>
        </div>
        @if(session('success'))
            <div class="mb-4 p-3 rounded bg-emerald-100 text-emerald-800 border border-emerald-200">{{ session('success') }}</div>
        @endif
        <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label for="code" class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Code</label>
                <input type="text" class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 @error('code') border-red-500 @enderror" id="code" name="code" value="{{ old('code', $product->code) }}">
                @error('code')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="name" class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name', $product->name) }}">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="quantity" class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Quantity</label>
                <input type="number" class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 @error('quantity') border-red-500 @enderror" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                @error('quantity')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="price" class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Price</label>
                <input type="number" step="0.01" class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 @error('price') border-red-500 @enderror" id="price" name="price" value="{{ old('price', $product->price) }}">
                @error('price')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description" class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Description</label>
                <textarea class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="file" class="block font-semibold mb-1 text-gray-700 dark:text-gray-200">Product File</label>
                <input type="file" class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 @error('file') border-red-500 @enderror" id="file" name="file">
                @if($product->file_path)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->file_path) }}" alt="Product Image" class="w-24 h-24 object-cover rounded">
                    </div>
                @endif
                @error('file')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-black rounded-lg font-semibold shadow hover:bg-emerald-700 transition">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection