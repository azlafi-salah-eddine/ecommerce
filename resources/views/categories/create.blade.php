@extends('base')
@section('title','Create Product')
@section('content')
    <div class="flex flex-col items-center justify-center  bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-10 rounded-xl shadow-xl border border-gray-200">
            <h3 class="text-3xl font-bold text-gray-800 mb-4 text-center">Create Category</h3>
            <form class="space-y-5" action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-1">
                    <label class="block text-gray-700 text-lg font-semibold mb-1">Name:</label>
                    <input type="text" name="name" class="block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-md focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out" value="{{ old('name') }}" required>
                </div>
                <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transform transition-transform duration-300 ease-in-out hover:scale-105">Create Category</button>
            </form>
        </div>
    </div>
@endsection
