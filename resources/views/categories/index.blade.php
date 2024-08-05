@extends('base')
@section('title','categories')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-3xl font-bold text-gray-800 mb-4 text-center">List Categories</h3>
        <a href="{{route('categories.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center">
            <i class="fas fa-plus mr-2"></i> Add Categories
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
            <tr class="bg-gray-200">
                <th class="py-3 px-4 border-b border-gray-300 text-left">#id</th>
                <th class="py-3 px-4 border-b border-gray-300 text-left">Name</th>
                <th class="py-3 px-4 border-b border-gray-300 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $categorie)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b border-gray-300">{{$categorie->id}}</td>
                    <td class="py-2 px-4 border-b border-gray-300">{{$categorie->name}}</td>
                    <td class="py-2 px-4 border-b border-gray-300">
                        <div class="flex space-x-2">
                            <a href="{{ route('categories.show', $categorie) }}" class="bg-green-500 hover:bg-green-700 text-white p-2 rounded flex items-center">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('categories.edit', $categorie) }}" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded flex items-center">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $categorie) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
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
                    <td colspan="3" class="py-4 px-4 text-center text-gray-500">No Categories</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
@endsection
