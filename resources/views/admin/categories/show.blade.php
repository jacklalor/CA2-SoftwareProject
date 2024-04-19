@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h1 class="text-2xl font-bold mb-4">Category Name:</h1>
    <p class="text-lg">{{ $category->name }}</p>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-4">Category Contents:</h1>
    @forelse($category->items as $item)
        <p>{{ $item->name }}</p>
    @empty
        <p class="text-lg text-gray-600">No items found in this category.</p>
    @endforelse
</div>

<div class="mt-6">
    <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"><a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a></button>

    <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
        @csrf
        @method('DELETE')
        <!-- Other form fields or buttons -->
    </form>
    
    <button type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"><a href="{{ route('admin.categories.index') }}">Back</a></button>
</div>

@endsection
