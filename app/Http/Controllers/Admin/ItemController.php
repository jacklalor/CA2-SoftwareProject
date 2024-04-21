<?php



namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Category;

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
    $category = Category::findOrFail($id);

    
    // Return a view to display the item
    return view('admin.items.show', compact('item'));
}


    public function create()
{
    // dd("Inside create function"); 

    $categories = Category::all();
    $items = Item::all(); // Retrieve all items
    // Return the view for creating a new item
    return view('admin.items.create', compact('categories', 'items'));
}

     public function destroy(string $id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        return redirect()->route('admin.items.index')->with('status', 'item deleted successfully');
    }


    public function store(Request $request)
    {
        //dd($request->title)

        //validation rules
        $rules =[
            'name'=> 'required|string|min:2|max:150',
            'description'=> 'required|string|min:10|max:150',
            'sub_description'=> 'required|string|min:10|max:30',
            'condition'=> 'required|string|min:2|max:150',
            'category_id' => 'required',
            'price'=> 'required|int|min:1|max:4',
            'item_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $messages=[
            'item.unique'=>'item title should be unique'
        ];

        

        



        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->sub_description = $request->sub_description;
        $item->condition = $request->condition;


        $item->price = $request->price;
        $item_url = $request->file('item_url');
        $extension = $item_url->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '.' . $extension;

        $item_url->storeAs('public/images', $filename);
        $item->save();

        $request->validate($rules, $messages);

        //  Takes an uploaded file from a form, assigns it a unique filename based on the current date and time, and then stores it in the public/images
        

        // returns the user to admin items index page
        return to_route('admin.items.index');

    }

    // Define other methods like show(), edit(), update(), destroy(), etc. as needed

    
}
