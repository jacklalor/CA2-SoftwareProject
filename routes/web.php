<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::resource('/user/category', CategoryController::class);
    Route::resource('/user/item', ItemController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tents', [CategoryController::class, 'showTents'])->name('tents');
Route::get('/sleeping', [CategoryController::class, 'showSleeping'])->name('sleeping');
Route::get('/lights', [CategoryController::class, 'showLights'])->name('lights');
Route::get('/accessories', [CategoryController::class, 'showAccessories'])->name('accessories');

Route::get('/items/{id}', function ($id) {
    $item = Item::find($id);
    $categories = $item->categories;

    // Return the item and its categories to the view
    return view('items.show', compact('item', 'categories'));
});

require __DIR__.'/auth.php';
