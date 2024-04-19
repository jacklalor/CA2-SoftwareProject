@extends('layouts.admin')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Categories
</h2>
@endsection

@section('content')





    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
     @forelse($categories as $category)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $category->name }}
            </th>
            

            
            
            <td class="px-6 py-4">
                <a href="{{ route('admin.categories.show', ['id' => $category->id]) }}">Read more</a>

            </td>
        </tr>

        @empty
        <h4>No Categories Found!</h4>
        @endforelse
    </tbody>
</table>
@endsection