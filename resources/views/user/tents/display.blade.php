@extends('layouts.myApp')

@section('header')
    <h1 class="text-2xl text-center py-4">FestiTrade.</h1> <!-- Added FestiTrade -->
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Tents
    </h2>
@endsection

@section('content')
    <div class="flex justify-center pt-8 pb-16"> <!-- Added padding top and bottom -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($tents as $tent)
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg">
                    <img src="{{ asset('storage/' . $tent->image_url) }}" alt="{{ $tent->name }}">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $tent->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $tent->sub_description }}</p>
                        @if($tent->seller && $tent->seller->name) <!-- Check if seller relationship exists and seller's name is not null or empty -->
                            <p class="text-gray-700 dark:text-gray-300 mt-2">Listed By: {{ $tent->seller->name }}</p> <!-- Display "Listed By:" before seller's name -->
                        @else
                            <p class="text-gray-700 dark:text-gray-300 mt-2">Seller not provided</p> <!-- Fallback message -->
                        @endif

                        <p class="text-gray-900 dark:text-white text-xl font-bold mt-2">€ {{ $tent->price }}</p>
                        <button class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded mt-4">Buy</button> <!-- Added button -->
                    </div>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-400">No tents available.</p>
            @endforelse
        </div>
    </div>

    <footer class="text-center py-4 bg-gray-200 dark:bg-gray-800">
        <div class="text-gray-600 dark:text-gray-400">
            <p>Email: contact@festitrade.com</p>
            <p>Phone: +1 (123) 456-7890</p>
            <p>Follow us on <a href="https://facebook.com/festitrade" target="_blank" class="underline">Facebook</a>, <a href="https://twitter.com/festitrade" target="_blank" class="underline">Twitter</a>, and <a href="https://instagram.com/festitrade" target="_blank" class="underline">Instagram</a></p>
        </div>
    </footer>
@endsection
