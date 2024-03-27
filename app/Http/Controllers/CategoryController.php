<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display the specified category and its associated items.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        // Retrieve the category with its associated items
        $category = Category::with('items')->find($id);

        // Return the category and its items to the view
        return view('categories.show', compact('category'));
    }
}
