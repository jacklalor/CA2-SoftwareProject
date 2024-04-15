@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Items
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
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Sub description
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Condition
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        
        <tbody>

    <!--used to loop through a collection of items and generate a table row for each item with the item's details displayed in different table cells-->
     @forelse($items as $item)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $item->name }}
            </th>
            <td class="px-6 py-4">
                {{ $item->description }}
            </td>
            <td class="px-6 py-4">
                {{ $item->sub_description }}
            </td>
            <td class="px-6 py-4">
                <p>€</p>     {{ $item->price }} 
            </td>
            <td class="px-6 py-4">
                {{ $item->condition }}
            </td>
            <td class="px-6 py-4">
            <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><a href="{{ route('user.items.show', $item->id) }}">Read more</a></button>
            </td>
        </tr>

        @empty
        <h4>No Items Found!</h4>
        @endforelse
    </tbody>
</table>
@endsection