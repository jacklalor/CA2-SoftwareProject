<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;




class ItemController extends Controller
{
    public function show($id)
    {
        $item = Item::find($id);
        $categories = $item->categories;
        
        // Return the item and its categories to the view
        return view('admin.items.show', compact('item', 'categories'));
    }

    public function showTents()
{
    $yourTentCategoryId = 1;

    // Retrieve all tents from the database
    $tents = Item::where('category_id', $yourTentCategoryId)->get();


    // Pass the tents data to the view for display
    return view('user.tents.display', compact('tents'));
}

public function showSleeping()
{
    $yourSleepingCategoryId = 2;

    // Retrieve all tents from the database
    $sleeping = Item::where('category_id', $yourSleepingCategoryId)->get();

    // Pass the tents data to the view for display
    return view('user.sleeping.display', compact('sleeping'));
}

public function showLights()
{
    $yourLightsCategoryId = 3;

    // Retrieve all tents from the database
    $lights = Item::where('category_id', $yourLightsCategoryId)->get();

    // Pass the tents data to the view for display
    return view('user.lights.display', compact('lights'));
}

public function showCooking()
{
    $yourCookingCategoryId = 4;

    // Retrieve all tents from the database
    $cooking = Item::where('category_id', $yourCookingCategoryId)->get();

    // Pass the tents data to the view for display
    return view('user.cooking.display', compact('cooking'));
}

public function showAccessories()
{
    $yourAccessoriesCategoryId = 5;

    // Retrieve all tents from the database
    $accessories = Item::where('category_id', $yourAccessoriesCategoryId)->get();

    // Pass the tents data to the view for display
    return view('user.accessories.display', compact('accessories'));
}

public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|min:2|max:150',
        'description' => 'required|string|min:10|max:150',
        'sub_description' => 'required|string|min:10|max:30',
        'condition' => 'required|string|min:2|max:150',
        'category_id' => 'required',
        'price' => 'required|int|min:1|max:1000',
        'item_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Check if file was uploaded
    if ($request->hasFile('item_url')) {
        $item_url = $request->file('item_url');

        // Check if the file is valid
        if ($item_url->isValid()) {
            $extension = $item_url->getClientOriginalExtension();
            $filename = date('Y-m-d-His') . '.' . $extension;

            // Store the image
            $item_url->storeAs('public/images', $filename);

            // Create a new item instance
            $item = new Item;
            $item->name = $request->name;
            $item->description = $request->description;
            $item->sub_description = $request->sub_description;
            $item->condition = $request->condition;
            $item->price = $request->price;
            $item->item_url = $filename;
            $item->save();

            // Redirect the user to the admin items index page
            return redirect()->route('admin.items.index')->with('success', 'Item created successfully.');
        } else {
            // Handle invalid file
            return redirect()->back()->withErrors(['item_url' => 'Invalid image file.']);
        }
    } else {
        // Handle case where no file is uploaded
        return redirect()->back()->withErrors(['item_url' => 'Please upload an image file.']);
    }

}





// public function create()
// {
//     $items = Item::all();

//     return view('admin.items.create', [
//         'items' => $items,
//     ]);
// }
}
