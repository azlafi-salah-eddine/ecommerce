@extends('base')
@section('title', 'Home page')
@section('content')
    @if (Auth::check())
        <div x-data="{ cartOpen: false }">
            <!-- Cart Toggle Button -->
            <button @click="cartOpen = !cartOpen" class="fixed bottom-4 right-4 bg-pink-700 text-white p-3 rounded-full shadow-lg hover:bg-pink-500 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </button>

            <!-- Cart -->
            <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300 z-50">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
                    <button @click="cartOpen = false" class="text-gray-600 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <hr class="my-3">

                <!-- Cart Items -->
                <div>
                    @foreach($cartItems as $cartItem)
                        <div class="flex justify-between mt-6">
                            <div class="flex">
                                <img class="h-20 w-20 object-cover rounded" src="{{ asset('storage/'.$cartItem->product->image) }}" alt="{{ $cartItem->product->name }}">
                                <div class="mx-3">
                                    <h5 class="text-gray-700 uppercase font-bold">{{ $cartItem->product->name }}</h5>
                                    <p class="text-gray-600 mt-2 text-sm">{{ $cartItem->product->description }}</p>
                                </div>
                            </div>
                            <div class="text-balance">{{ $cartItem->product->price }} MAD</div>
                            <form method="POST" action="{{ route('cart.remove') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $cartItem->product->id }}">
                                <button type="submit" class="text-red-600 hover:text-red-800 focus:outline-none">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>


                <!-- Checkout Button -->
                <a href="" class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>Checkout</span>
                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    @endif
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filter Bar -->
            <div class="w-full lg:w-1/4">
                <h2 class="text-2xl font-bold mb-4">Filters</h2>
                <form method="get" class="border-2 border-gray-400 p-6 rounded-lg">
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
                    <div class="mb-4">
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
                    <!-- Filter and Reset buttons -->
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-500">Filter</button>
                        <a type="reset" class="bg-gray-600 text-white p-2 rounded-lg hover:bg-gray-500" href="{{ route('home_page') }}">Reset</a>
                    </div>
                </form>
            </div>
            <!-- Products Section -->
            <div class="w-full lg:w-3/4">
                <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mt-8">
                    @foreach($products as $product)
                        <div class="w-full max-w-xs mx-auto rounded-lg shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
                            <div class="relative w-full h-64">
                                <img class="absolute top-0 left-0 w-full h-full object-contain" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                                <form method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="absolute top-4 right-4 p-3 rounded-full bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 448 448" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(0.9999999999999994,0,0,0.9999999999999994,1.7053025658242404e-13,1.7053025658242404e-13)"><path d="M408 184H272a8 8 0 0 1-8-8V40c0-22.09-17.91-40-40-40s-40 17.91-40 40v136a8 8 0 0 1-8 8H40c-22.09 0-40 17.91-40 40s17.91 40 40 40h136a8 8 0 0 1 8 8v136c0 22.09 17.91 40 40 40s40-17.91 40-40V272a8 8 0 0 1 8-8h136c22.09 0 40-17.91 40-40s-17.91-40-40-40zm0 0" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
                                    </button>
                                </form>
                            </div>
                            <div class="px-4 py-3">
                                <h3 class="text-gray-900 font-semibold text-lg">{{ $product->name }}</h3>
                                <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                                <span class="text-gray-900 font-bold">{{ $product->price }} MAD</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
