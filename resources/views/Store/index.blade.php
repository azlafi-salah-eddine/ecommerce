@php use Illuminate\Support\Facades\Request; @endphp
@extends('base')
@section('title', 'Home page')
@section('content')
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filter Bar -->
            <div class="w-full lg:w-1/4 ">
                <h2 class="text-2xl font-bold mb-4">Filters</h2>
                <form method="get" class="border-2 border-gray-400 p-6 rounded-lg">
                    <!-- Name or description filter -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Name or description</label>
                        <input type="text" name="name" value="{{Request::input('name')}}" placeholder="Name"
                               class="w-full border border-gray-300 rounded-lg p-2 mt-2">
                    </div>
                    <!-- Categories filter -->
                    <label class="block mb-2 text-gray-700">Categories</label>
                    @foreach($Categories as $category)
                        <div class=" ">
                        <label class="block">
                            <input @checked(in_array($category->id,Request::input('categories',[]))) type="checkbox" name="categories[]" value="{{$category->id}}" class="mr-2 form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500"> {{$category->name}}
                        </label>
                        </div>
                    @endforeach
                    <!-- Pricing filter -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Pricing</label>
                        <div class="mt-2">
                            <label class="block">
                                <input type="number" placeholder="Min price" min="100" name="min"
                                       class="w-full border border-gray-300 rounded-lg p-2 mt-2">
                            </label>
                            <label class="block">
                                <input type="number" placeholder="Max price" name="max" min="100"
                                       class="w-full border border-gray-300 rounded-lg p-2 mt-2">
                            </label>
                        </div>
                    </div>
                    <!-- Filter and Reset buttons -->
                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-500">Filter
                        </button>
                        <a type="reset" class="bg-gray-600 text-white p-2 rounded-lg hover:bg-gray-500" href="{{route('home_page')}}">Reset
                        </a>
                    </div>
                </form>
            </div>
            <!-- Products Section -->
            <div class="w-full lg:w-3/4">
                <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mt-8">
                    @foreach($products as $product)
                        <div
                            class="w-full max-w-xs mx-auto rounded-lg shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
                            <div class="relative w-full h-64">
                                <img class="absolute top-0 left-0 w-full h-full object-contain"
                                     src="{{ asset('storage/'.$product->image) }}" alt="{{$product->name}}">
                                <button
                                    class="absolute top-4 right-4 p-3 rounded-full bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="px-6 py-4">
                                <h3 class="text-gray-700 uppercase text-lg font-bold">{{$product->name}}</h3>
                                <p class="text-gray-600 mt-2 text-sm">{{$product->description}}</p>
                                <div class="flex items-center justify-between mt-4">
                                    <span
                                        class="text-white bg-blue-500 rounded-full px-3 py-1">Quantity: {{$product->quantity}}</span>
                                    <span
                                        class="text-white bg-green-500 rounded-full px-3 py-1">{{$product->price}} MAD</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
