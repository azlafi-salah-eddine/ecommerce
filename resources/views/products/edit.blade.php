@extends('base')
@section('title', 'Update Product')
@section('content')
    <div class="flex flex-col items-center justify-center bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-10 rounded-xl shadow-xl border border-gray-200">
            <h3 class="text-3xl font-bold text-gray-800 mb-4 text-center">Update Product</h3>
            <form class="space-y-5" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-semibold mb-1">Name:</label>
                    <input type="text" name="name" class="block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out" value="{{ old('name', $product->name) }}" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-semibold mb-1">Description:</label>
                    <textarea name="description" class="block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out" rows="3" required>{{ old('description', $product->description) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-semibold mb-1">Image:</label>
                    <input type="file" name="image" class="block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-semibold mb-1">Quantity:</label>
                    <input type="number" name="quantity" class="block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out" value="{{ old('quantity', $product->quantity) }}" required>
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 text-lg font-semibold mb-1">Category:</label>
                    <select id="category_id" name="category_id" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300 focus:border-indigo-300">
                        <option value="">Choose your category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-semibold mb-1">Price:</label>
                    <input type="number" name="price" class="block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out" value="{{ old('price', $product->price) }}" required>
                </div>
                <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transform transition-transform duration-300 ease-in-out hover:scale-105">Update Product</button>
            </form>
        </div>
    </div>
@endsection
