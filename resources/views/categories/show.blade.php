@extends('base')
@section('title', 'Category Details')
@section('content')
    <div class="flex flex-col items-center justify-center bg-gray-100">
        <div class="w-full max-w-4xl bg-white p-10 rounded-xl shadow-xl border border-gray-200">
            <!-- Back Button -->
            <div class="flex justify-start mb-4">
                <a href="{{ route('categories.index') }}" class="py-2 px-3 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow-lg flex items-center text-sm">
                    <i class="fas fa-arrow-left mr-1"></i>
                </a>
            </div>

            <!-- Category Details -->
            <h3 class="text-3xl font-bold text-gray-800 mb-4 text-center">Category: {{ $category->name }}</h3>

            <!-- Products Table -->
            <div class="mb-6">
                <h4 class="text-2xl font-semibold text-gray-700 mb-3">Products</h4>
                @if($products->isEmpty())
                    <p class="text-gray-500">No products found for this category.</p>
                @else
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Product Name</th>
                            <th class="py-2 px-4 border-b text-left">Price</th>
                            <th class="py-2 px-4 border-b text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                                <td class="py-2 px-4 border-b text-center">
                                    <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
