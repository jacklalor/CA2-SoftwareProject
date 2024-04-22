@extends('layouts.admin')

@section('header')
<h3>Create Item</h3>    

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<form method="POST" action="{{ route('admin.items.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name" id="name" value="{{  old('name') }}"/>
        @if($errors->has('name'))
        <span>{{ $errors->first('name') }}</span>
        @endif

    </div>
    <textarea
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Description..."
                        class="w-full mt-6"
                        :value="@old('description')"></textarea>

                        <textarea
                        name="sub_description"
                        rows="10"
                        field="sub_description"
                        placeholder="Sub_Description..."
                        class="w-full mt-6"
                          :value="@old('sub_description')"></textarea>

                          <div>
                            <!-- Example of how the condition field might be included in your form -->
                            <label for="condition">Condition</label>
<input type="text" name="condition" value="{{ old('condition') }}" />

                    
                        </div>
                        

    <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
            <span>{{ $message }}</span>
            @enderror
        </div>

    {{-- <div class="form-group">
        <label for="item">item</label>
        <select name="item_id">

            @foreach($items as $item)
                <option {{ old('item_id') == $item->id ? "selected" : ""}} value="{{$item->id}}">{{$item->title}}</option>



            @endforeach
        </select>
     </div> --}}

     <div>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0"/>
        @error('price')
        <span>{{ $message }}</span>
        @enderror
    </div>
    

    <div>
        <label for="item_url">Item Image</label>
        <input type="file" name="item_url" id="item_url" accept="image/*">
        @error('item_url')
            <span>{{ $message }}</span>
        @enderror
    </div>
                    
                    
    <!-- edited the create button using tailwind css -->
    <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Create</button>
    <!-- Created a back button that brought you back to your previous page and then styled it using tailwind -->
    <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"><a href="{{ route('admin.items.index') }}">Back</a></button>
</form>
@endsection