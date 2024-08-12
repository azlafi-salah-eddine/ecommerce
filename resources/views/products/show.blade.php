@extends('base')

@section('title', 'Product Page')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <!-- Product Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div>
                <img class="w-full max-w-md h-auto object-cover rounded-lg shadow-lg transition-transform duration-300 hover:scale-105 mx-auto" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
            </div>

            <!-- Product Details -->
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-6">{{ $product->name }}</h1>
                <p class="text-gray-600 text-lg leading-relaxed mb-8">{{ $product->description }}</p>

                <!-- Additional Information -->
                <div class="text-gray-600 text-lg mb-4">
                    <span class="font-semibold">Category:</span> {{ $product->category->name }}
                </div>
                <div class="text-gray-600 text-lg mb-4">
                    <span class="font-semibold">Stock:</span>
                    <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                    </span>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-6">{{ number_format($product->price, 2) }} MAD</div>

                <!-- Quantity Selector -->
                <form method="POST" action="">
                    @csrf
                    <div class="flex items-center mb-6">
                        <label for="quantity" class="mr-4 text-lg font-semibold text-gray-600">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" class="w-24 px-4 py-2 border rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    </div>

                    <!-- Add to Cart Button -->
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-6 rounded-lg shadow-md hover:shadow-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300">Add to Cart</button>
                </form>

            </div>
        </div>
    </div>
@endsection
