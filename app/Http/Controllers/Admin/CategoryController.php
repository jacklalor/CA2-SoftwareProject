<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; // Add this line

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();

        return view('admin.categories.index',[
            'items' => $items,
            'categories' => $categories
        ]);
    }
    
   

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        // Fetch the category from the database by its ID
        $category = Category::findOrFail($id);
        
        // Return a view to display the category
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::FindOrFail($id);
        // dd($selectedcategories);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validation rules
        $rules = [
            'name' => 'required|string|min:2|max:150',
            
        ];

        $messages=[
            'name.unique'=>'Category name should be unique'
        ];


        $request->validate($rules, $messages);


        // dd($request);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()
                ->route('admin.categories.index')
                ->with('status', 'Updated category!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', 'category deleted successfully');
    }

    public function create()
{
    $categories = Category::all(); // Assuming you're retrieving categories from the database
    return view('admin.categories.create', ['categories' => $categories]);
}

}