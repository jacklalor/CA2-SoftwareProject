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
}
