@extends('layouts.myApp')

@section('content')
<h3>Edit category</h3>    
<!--used to display error messages in case there are validation errors-->
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error) <!--This initiates a foreach loop that iterates through each validation error message in the $errors object-->
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('admin.categories.update', $category->id ) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="">Title</label>

        <input type="text" name="title" id="title" value="{{ old('title')? : $category->title }}"/>

        @if($errors->has('title')) <!--checks if there are any validation errors specifically related to the form input field with the name 'title'-->
            <span>{{ $errors->first('title') }}</span>
        @endif
    </div>
    
    <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Update</button>
    <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"><a href="{{ route('admin.categories.index') }}">Back</a></button>

</form>
@endsection