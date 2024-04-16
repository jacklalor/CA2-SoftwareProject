<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class CategoryController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        $items = Item::all();

        return view('dashboard', [
            'categories' => $categories,
            'items' => $items
        ]);
    }

    public function index()
    {
        $categories = Category::all();

        return view('category.index',[
            'categories' => $categories
        ]);
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::FindOrFail($id);

        return view('user.categories.show', [
            'category' => $category,
        ]);
    }

    

}