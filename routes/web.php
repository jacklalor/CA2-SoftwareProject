
<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\ItemController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\ItemController as UserItemController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

// Public routes accessible to all users
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
Route::get('/user/home', [HomeController::class, 'index'])->name('user.home');

Route::get('/user/profile/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
Route::get('/user/items/tents', [ItemController::class, 'showTents'])->name('user.items.tents');
Route::get('/user/items/sleeping', [ItemController::class, 'showSleeping'])->name('user.items.sleeping');
Route::get('/user/items/lights', [ItemController::class, 'showLights'])->name('user.items.lights');
Route::get('/user/items/accessories', [ItemController::class, 'showAccessories'])->name('user.items.accessories');



Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
Route::get('/admin/items/index', [AdminItemController::class, 'index'])->name('admin.items.index');
Route::get('/admin/categories/index', [AdminItemController::class, 'index'])->name('admin.categories.index');




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

    // Admin items routes
    Route::resource('/admin/items', AdminItemController::class);

    // Admin categories routes
    Route::resource('/admin/categories', AdminCategoryController::class);

    // Other admin routes can be defined here
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

});

// Public routes for viewing items by category
Route::get('/items/tents', [UserItemController::class, 'showTents'])->name('item.tents');
Route::get('/items/sleeping', [UserItemController::class, 'showSleeping'])->name('item.sleeping');
Route::get('/items/lights', [UserItemController::class, 'showLights'])->name('item.lights');
Route::get('/items/accessories', [UserItemController::class, 'showAccessories'])->name('item.accessories');

// Individual item route
Route::get('/items/{id}', function ($id) {
    $item = Item::findOrFail($id);
    $categories = $item->categories;

    // Return the item and its categories to the view
    return view('items.show', compact('item', 'categories'));
});

// Authentication routes
require __DIR__.'/auth.php';
