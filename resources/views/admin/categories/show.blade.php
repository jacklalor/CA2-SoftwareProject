@extends('layouts.admin')

@section('content')




<h1><b>Category Name:</b></h1>
<p>{{ $category->name }}</p>

<h1><b>category Contents:</b></h1>
@forelse($category->items as $item)
<p>{{ $item->name }}</p>

@empty
        <h4>No categories Found!</h4>
        @endforelse


<div>
<button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"><a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a></button>

    <form method="POST" action="{{ route('admin.categoryies.destroy' , $category->id) }}"> <!-- creates the URL for the 'destroy' action of the 'categories' resource, with the specific category ID provided as a parameter.-->
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button> 
    </form>
    <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"><a href="{{ route('admin.categories.index') }}">Back</a></button>

    
    
</div>

@endsection