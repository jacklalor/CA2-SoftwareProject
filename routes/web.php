<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Item;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;

use App\Http\Controllers\User\ItemController as UserItemController;
use App\Http\Controllers\User\ItemController as UserCategoryController;


use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::resource('/user/category', CategoryController::class);
    Route::resource('/user/item', ItemController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('user/items/tents', [ItemController::class, 'showTents'])->name('item.tents');
Route::get('user/items/sleeping', [ItemController::class, 'showSleeping'])->name('item.sleeping');
Route::get('user/items/lights', [ItemController::class, 'showLights'])->name('item.lights');
Route::get('user/items/accessories', [ItemController::class, 'showAccessories'])->name('item.accessories');

Route::resource('/user/items', UserItemController::class)
->middleware(['auth', 'role:user, admin'])
->names('user.items')
->only(['index', 'show']);

Route::resource('/admin/items', AdminItemController::class)
->middleware(['auth', 'role:admin'])
->names('admin.items')
->only(['index', 'show', 'create', 'edit', 'destroy', 'update', 'store']);


Route::get('/items/{id}', function ($id) {
    $item = Item::find($id);
    $categories = $item->categories;

    // Return the item and its categories to the view
    return view('items.show', compact('item', 'categories'));

});

require __DIR__.'/auth.php';
