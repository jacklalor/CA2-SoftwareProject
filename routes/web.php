<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\ItemController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\ItemController as UserItemController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

// Route::post('/admin/items/create', [AdminItemController::class, 'create'])->name('admin.items.create');

// Public routes accessible to all users
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
Route::get('/user/home', [HomeController::class, 'index'])->name('user.home');

Route::get('/user/profile/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
Route::get('/user/items/tents', [ItemController::class, 'showTents'])->name('user.items.tents');
Route::get('/user/items/sleeping', [ItemController::class, 'showSleeping'])->name('user.items.sleeping');
Route::get('/user/items/lights', [ItemController::class, 'showLights'])->name('user.items.lights');
Route::get('/user/items/cooking', [ItemController::class, 'showCooking'])->name('user.items.cooking');

Route::get('/user/items/accessories', [ItemController::class, 'showAccessories'])->name('user.items.accessories');



Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
Route::get('/admin/items/index', [AdminItemController::class, 'index'])->name('admin.items.index');
Route::get('/admin/items/create', [AdminItemController::class, 'create'])->name('admin.items.create');
// Route::get('/admin/items/show', [AdminItemController::class, 'show'])->name('admin.items.show');
Route::get('/admin/items/show/{id}', [AdminItemController::class, 'show'])->name('admin.items.show');

// Route::get('/admin/items/edit/{id}', [AdminItemController::class, 'create'])->name('admin.items.edit');
Route::post('/admin/items/store', [ItemController::class, 'store'])->name('admin.items.store');
Route::post('admin/items', [ItemController::class, 'store'])->name('admin.items.store');




Route::get('/admin/items/store', [AdminItemController::class, 'store'])->name('admin.items.store');

Route::get('/admin/categories/index', [AdminItemController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [AdminItemController::class, 'create'])->name('admin.categories.create');
Route::get('/admin/categories/edit', [AdminItemController::class, 'edit'])->name('admin.categories.edit');
Route::delete('/admin/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

Route::get('/admin/categories/create', [AdminItemController::class, 'create'])->name('admin.categories.create');


Route::get('/admin/categories/{id}', 'App\Http\Controllers\Admin\CategoryController@show')->name('admin.categories.show');

Route::get('/admin/categories/show', [AdminItemController::class, 'show'])->name('admin.categories.show');





// Authenticated user routes
Route::middleware(['auth', 'user'])->group(function () {
    // Define user-specific routes here
});

// Authenticated admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/categories/show', function () {
        return view('admin.categories.show');
    })->name('admin.categories.show');
    Route::get('/admin/categories/edit', function () {
        return view('admin.categories.edit');
    })->name('admin.categories.edit');
    Route::get('/admin/categories/destroy', function () {
        return view('admin.categories.destroy');
    })->name('admin.categories.destroy');
    Route::get('/admin/items/show', function () {
        return view('admin.items.show');
    })->name('admin.items.show');

    // Admin items routes
    // Route::resource('/admin/items', AdminItemController::class);

    // Admin categories routes
    Route::resource('/admin/categories/index', AdminCategoryController::class);
    Route::resource('/admin/categories/show', AdminCategoryController::class);
    Route::resource('/admin/categories/destroy', AdminCategoryController::class);



    // Other admin routes can be defined here
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

});

// Public routes for viewing items by category
Route::get('/items/tents', [UserItemController::class, 'showTents'])->name('item.tents');
Route::get('/items/sleeping', [UserItemController::class, 'showSleeping'])->name('item.sleeping');
Route::get('/items/lights', [UserItemController::class, 'showLights'])->name('item.lights');
Route::get('/items/accessories', [UserItemController::class, 'showAccessories'])->name('item.accessories');

// Route::get('/admin/items/{id}', [ItemController::class, 'show']);

// Individual item route
Route::get('/items/{id}', function ($id) {
    $item = Item::findOrFail($id);
    $categories = $item->categories;

    // Return the item and its categories to the view
    return view('items.show', compact('item', 'categories'));
});

// Authentication routes
require __DIR__.'/auth.php';