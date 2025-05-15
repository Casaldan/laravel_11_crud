@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-10 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-1">Products</h1>
            <p class="text-gray-500 dark:text-gray-300">Browse and manage your product inventory.</p>
        </div>
        <a href="{{ route('products.create') }}" class="inline-block px-6 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-black font-semibold rounded-lg shadow hover:from-green-600 hover:to-emerald-700 transition">+ Add New Product</a>
    </div>
    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 border border-green-200 shadow">{{ session('success') }}</div>
    @endif
    @if($products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-2xl transition p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold text-gray-400">#{{ $product->code }}</span>
                            <span class="inline-block px-2 py-0.5 text-xs bg-blue-100 text-blue-700 rounded">Qty: {{ $product->quantity }}</span>
                        </div>
                        @if($product->file_path)
                            <img src="{{ asset('storage/' . $product->file_path) }}" alt="Product Image" class="w-24 h-24 object-cover rounded mb-2">
                        @endif
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-2">{{ $product->name }}</h2>
                        <p class="text-lg font-semibold text-emerald-600 dark:text-emerald-400 mb-4">₱{{ number_format($product->price, 2) }}</p>
                    </div>
                    <div class="flex gap-2 mt-2">
                        <a href="{{ route('products.show', $product) }}" class="flex-1 px-4 py-2 bg-yellow-400 text-black rounded-lg font-medium hover:bg-yellow-500 transition text-sm text-center">Show</a>
                        <a href="{{ route('products.edit', $product) }}" class="flex-1 px-4 py-2 bg-blue-600 text-black rounded-lg font-medium hover:bg-blue-700 transition text-sm text-center">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button class="w-full px-4 py-2 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700 transition text-sm" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center justify-center py-24">
            <svg class="w-20 h-20 text-gray-300 mb-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" /></svg>
            <h2 class="text-2xl font-bold text-gray-400 mb-2">No products found</h2>
            <p class="text-gray-500 mb-6">Get started by adding your first product.</p>
            <a href="{{ route('products.create') }}" class="px-6 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold rounded-lg shadow hover:from-green-600 hover:to-emerald-700 transition">+ Add New Product</a>
        </div>
    @endif
</div>
@endsection