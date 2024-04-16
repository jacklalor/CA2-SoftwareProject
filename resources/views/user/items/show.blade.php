@extends('layouts.myApp')

@section('content')
<h1>item List</h1>

{{-- outputs items information --}}
<h1><b>Item Name:</b></h1>
<p>{{ $item->name }}</p>

<h1><b>Description:</b></h1>
<p>{{ $item->description }}</p>

<h1><b>Price:</b></h1>
<p>€</p><p>{{ $item->price }}</p>

<h1><b>Item condition:</b></h1>
@forelse($item->categories as $category)
<p>{{ $category->name }}</p>

{{-- Display the user who enlisted the item --}}
@if ($item->user)
    <h1><b>Listed By:</b></h1>
    <p>{{ $item->user->name }}</p>
@else
    <p>No user information available for this item.</p>
@endif



@empty
        <h4>No items Found!</h4>
        @endforelse

<div>

   
        <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"><a href="{{ route('user.items.index') }}">Back</a></button>
    </form>
    
    
</div>

@endsection