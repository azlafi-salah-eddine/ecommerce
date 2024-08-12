@extends('base')
@section('title','Products')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-3xl font-bold text-gray-800 mb-4 text-center">List products</h3>
        <a href="{{route('products.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center">
            <i class="fas fa-plus mr-2"></i> Add product
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
            <tr class="bg-gray-200">
                <th class="py-3 px-4 border-b border-gray-300 text-left">#id</th>
                <th class="py-3 px-4 border-b border-gray-300 text-left">Name</th>
                <th class="py-3 px-4 border-b border-gray-300 text-left">Description</th>
                <th class="py-3 px-4 border-b border-gray-300 text-left">Image</th>
                <th class="py-3 px-4 border-b border-gray-300 text-left">Quantity</th>
                <th class="py-3 px-4 border-b border-gray-300 text-left">Price</th>
                <th class="py-3 px-4 border-b border-gray-300 text-left">category</th>
                <th class="py-3 px-4 border-b border-gray-300 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b border-gray-300">{{$product->id}}</td>
                    <td class="py-2 px-4 border-b border-gray-300">{{$product->name}}</td>
                    @php
                        $words = explode(' ', $product->description);
                        $shortDescription = implode(' ', array_slice($words, 0, 3)) . '...';
                    @endphp
                    <td class="py-2 px-4 border-b border-gray-300">{{ $shortDescription }}</td>

                    <td class="py-2 px-4 border-b border-gray-300">
                        <img class="w-24" src="storage/{{$product->image}}" alt="{{$product->name}}">
                    </td>
                    <td class="py-2 px-4 border-b border-gray-300">{{$product->quantity}}</td>
                    <td class="py-2 px-4 border-b border-gray-300">{{$product->price}} MAD</td>
                    <td class="py-2 px-4 border-b border-gray-300">
                        @if($product->category)
                            {{$product->category->name}}
                        @else
                            null
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b border-gray-300">
                        <div class="flex space-x-2">
                            <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded flex items-center">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white p-2 rounded flex items-center">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="py-4 px-4 text-center text-gray-500">No products</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
