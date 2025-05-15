@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10 px-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <div class="flex flex-col items-center mb-6">
            @if($product->file_path)
                <img src="{{ asset('storage/' . $product->file_path) }}" alt="Product Image" class="w-40 h-40 object-cover rounded-xl shadow mb-4">
            @endif
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $product->name }}</h2>
            <span class="text-sm text-gray-400 mb-2">Code: <span class="font-semibold text-gray-600 dark:text-gray-300">{{ $product->code }}</span></span>
        </div>
        <div class="space-y-4 mb-8">
            <div class="flex justify-between">
                <span class="font-semibold text-gray-700 dark:text-gray-200">Quantity:</span>
                <span class="text-gray-600 dark:text-gray-300">{{ $product->quantity }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-700 dark:text-gray-200">Price:</span>
                <span class="text-emerald-600 dark:text-emerald-400 font-bold">₱{{ number_format($product->price, 2) }}</span>
            </div>
            <div>
                <span class="font-semibold text-gray-700 dark:text-gray-200 block mb-1">Description:</span>
                <p class="text-gray-600 dark:text-gray-300 whitespace-pre-line">{{ $product->description }}</p>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('products.index') }}" class="px-6 py-2 bg-indigo-600 text-black rounded-lg font-semibold shadow hover:bg-indigo-700 transition">&larr; Back to Products</a>
        </div>
    </div>
</div>
@endsection