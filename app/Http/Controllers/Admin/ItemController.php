<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
{
    // Retrieve all items from the database
    $items = Item::all();

    // Retrieve all categories from the database
    $categories = Category::all();

    // Pass the items and categories data to the view
    return view('admin.items.index', compact('items', 'categories'));
}

public function show($id)
{
    // Fetch the item from the database by its ID
    $item = Item::findOrFail($id);
    
    // Return a view to display the item
    return view('admin.items.show', compact('item'));
}


    public function create()
{
    $categories = Category::all();
    $items = Item::all(); // Retrieve all items
    // Return the view for creating a new item
    return view('admin.items.create', compact('categories', 'items'));
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            // Define your validation rules here
        ]);

        // Create a new item with the validated data
        Item::create([
            // Assign values from the request to the item attributes
        ]);

        // Redirect back to the index page or wherever appropriate
        return redirect()->route('admin.items.index');
    }

    // Define other methods like show(), edit(), update(), destroy(), etc. as needed

    
}
