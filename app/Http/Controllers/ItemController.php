<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
    public function show($id)
    {
        $item = Item::find($id);
        $categories = $item->categories;

        // Return the item and its categories to the view
        return view('items.show', compact('item', 'categories'));
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
public function create()
{
    $items = Item::all();

    return view('admin.items.create', [
        'items' => $items,
    ]);
}
}
