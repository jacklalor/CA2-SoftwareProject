<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index',[
            'categories' => $categories
        ]);

         //Auth::admin()->authorizeRoles('admin');
         if(!Auth::user()->hasRole('admin')){
            return to_route('admin.categories.index');
           
        }

   $categories = Category::orderBy('created_at', 'desc')->paginate(8); // retrieves categories from the database, orders them by the creation timestamp in descending order, and then paginates the results with 8 categories per page. 

   return view('admin.categories.index', [ // Load and render the admin.categories.index view, and pass along the data from the $categories variable so that it can be used within the view.
       'categories' => $albums
   ]);

    }
    
   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $category = Category::FindOrFail($id);
        return view('admin.categories.show')->with('album', $album);
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
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', 'category deleted successfully');
    }

}