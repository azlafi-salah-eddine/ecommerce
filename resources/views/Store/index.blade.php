@extends('base')
@section('title', 'Home page')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filter Bar -->
            <div class="w-full lg:w-1/4">
                <h2 class="text-2xl font-bold mb-4">Filters</h2>
                <form method="get" class="border-2 border-gray-400 p-6 rounded-lg">
                    <!-- Filter and Reset buttons -->
                    <div class="flex justify-end items-end space-x-4">
                        <button type="submit" class="text-white px-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" color="blue" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                            </svg>
                        </button>
                        <a class=" text-white px-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2" href="{{ route('home_page') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" color="red" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>

                    <!-- Name or description filter -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Name or description</label>
                        <input type="text" name="name" value="{{ Request::input('name') }}" placeholder="Name" class="w-full border border-gray-300 rounded-lg p-2 mt-2">
                    </div>
                    <!-- Categories filter -->
                    <label class="block mb-2 text-gray-700">Categories</label>
                    @foreach($Categories as $category)
                        <div>
                            <label class="block">
                                <input @checked(in_array($category->id, Request::input('categories', []))) type="checkbox" name="categories[]" value="{{ $category->id }}" class="mr-2 form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500"> {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                    <!-- Pricing filter -->
                    <div class="mb-2">
                        <label class="block text-gray-700">Pricing</label>
                        <div class="mt-2">
                            <label class="block">
                                <input type="number" placeholder="Min price" min="100" name="min" class="w-full border border-gray-300 rounded-lg p-2 mt-2">
                            </label>
                            <label class="block">
                                <input type="number" placeholder="Max price" name="max" min="100" class="w-full border border-gray-300 rounded-lg p-2 mt-2">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Products Section -->
            <div class="w-full lg:w-3/4">
                <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mt-8">
                    @foreach($products as $product)
                        <a href="{{ route('show_product', $product->id) }}" class="block">
                            <div class="w-full max-w-xs mx-auto rounded-lg shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
                                <div class="relative w-full h-64">
                                    <img class="absolute top-0 left-0 w-full h-full object-contain" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                                    <form method="POST" action="">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="absolute top-4 right-4 p-3 rounded-full bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="px-4 py-3">
                                    <h3 class="text-gray-900 font-semibold text-lg">{{ $product->name }}</h3>
                                    @php
                                        $words = explode(' ', $product->description);
                                        $shortDescription = implode(' ', array_slice($words, 0, 5)) . '...';
                                    @endphp
                                    <p class="text-gray-600 mt-2">{{ $shortDescription }}</p>
                                    <span class="text-gray-900 font-bold">{{ $product->price }} MAD</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
