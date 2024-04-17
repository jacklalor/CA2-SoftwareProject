@extends('layouts.myApp')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Accessories
    </h2>
@endsection

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($accessories as $accessories)
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg">
                <img src="{{ $accessories->image_url }}" alt="{{ $accessories->name }}" class="h-64 w-full object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $accessories->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ $accessories->sub_description }}</p>
                    <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $accessories->seller?->name }}</p>
                    <p class="text-gray-900 dark:text-white text-xl font-bold mt-2">€ {{ $accessories->price }}</p>
                </div>
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-400">No accessories available.</p>
        @endforelse
    </div>
@endsection
