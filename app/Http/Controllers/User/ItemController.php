<?php
namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    /**
     * Display a item of the resource.
     */
    public function dashboard(Request $request)
{
    $query = $request->input('query');

    $items = Item::where('name', 'like', '%' . $query . '%')->paginate(50);
    $categories = Category::all();

    return view('dashboard', [
        'items' => $items,
        'categories' => $categories,
    ]);
}

        public function showTents()
    {
        $category = Category::where('name', 'Tents')->first();
        $items = $category->items()->paginate(10); // Assuming you have a relationship between Category and Item model
        return view('user.items.tents', compact('items'));
    }

    public function showSleeping()
    {
        $category = Category::where('name', 'Sleeping')->first();
        $items = $category->items()->paginate(10); // Assuming you have a relationship between Category and Item model
        return view('user.items.sleeping', compact('items'));
    }

    public function showLights()
    {
        $category = Category::where('name', 'Lights')->first();
        $items = $category->items()->paginate(10); // Assuming you have a relationship between Category and Item model
        return view('user.items.lights', compact('items'));
    }

    public function showAccessories()
    {
        $category = Category::where('name', 'Accessories')->first();
        $items = $category->items()->paginate(10); // Assuming you have a relationship between Category and Item model
        return view('user.items.accessories', compact('items'));
    }


    public function index()
    {
        $items = Item::all();
        $categories = Category::all();

        return view('item.index',[
            'items' => $items,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('item.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $rules = [
            'name' => 'required|string|min:2|max:150', //Checks that the title isnt the same as another title
            'condition' => 'required|in:New & Unused,"Used, Like New",Small Wear,Major Wear,Parts Only',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|min:5|max:1000',
            'sub_description' => 'required|string|min:5|max:30',
            'user_id' => 'required|exists:users,id',
            'item_image' => 'required|file|image'
        ];


        $request->validate($rules);
        // dd($request);


        $listing_image = $request->file('listing_image');
        $extension = $listing_image->getClientOriginalExtension();
        $filename = date('y-m-d-His') . '_' .  str_replace(' ', '_', $request->title) . '.' . $extension;


        $listing_image->storeAs('public/images', $filename);

        $item = Item::create([
            'name' => $request->name,
            'condition' => $request->condition,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'sub_description' => $request->sub_description,
            'user_id' => $request->user_id,
            'item_image' => $filename
        ]);

        return redirect()->route('item.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::FindOrFail($id);
        $item_all = Item::paginate(4);
        $categories = Category::all();

        return view('item.show', [
            'item' => $item,
            'categories' => $categories,
            'item_all' => $item_all
        ]);

        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
    
        // Check if the authenticated user is the owner of the item
        if ($item->user_id !== Auth::id()) {
            // If not, return an unauthorized response or redirect to a different page
            return redirect()->route('item.index')->with('error', 'You are not authorized to edit this item.');
        }
    
        $categories = Category::all();
    
        return view('item.edit', [
            'item' => $item,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $item = Item::findOrFail($id);
        //validation rules

        $rules = [
            'title' => 'required|string|min:2|max:150', //Checks that the title isnt the same as another title
            'condition' => 'required|in:New,Used',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|min:5|max:1000',
            'sub_description' => 'required|string|min:5|max:30',

            'user_id' => 'required|exists:users,id',
            'item_image' => 'required|file|image'

        ];
      
        $request->validate($rules);


        if($request->hasFile('item_image')){
            $listing_image = $request->file('item_image');
            $extension = $listing_image->getClientOriginalExtension();
            $filename = date('y-m-d-His') . '_' .  str_replace(' ', '_', $request->title) . '.' . $extension;


            $listing_image->storeAs('public/images', $filename);
            $item->listing_image = $filename;

        }

        $item->name = $request->name;
        $item->condition = $request->condition;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->sub_description = $request->sub_description;

        $item->category_id = $request->category_id;
        $item->user_id = $request->user_id;

        $item->save();

        return redirect()
                ->route('item.index')
                ->with('status', 'Updated item!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
    
        // Check if the authenticated user is the owner of the item
        if ($item->user_id !== Auth::id()) {
            // If not, return an unauthorized response or redirect to a different page
            return redirect()->route('item.index')->with('error', 'You are not authorized to delete this item.');
        }
    
        $item->delete();
    
        return redirect()->route('item.index')->with('status', 'Item deleted successfully');
    }
}