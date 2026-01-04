<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->get("/admin/dashboard", [DashboardController::class, "index"])->name('admin.dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', App\Http\Controllers\ProductController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('suppliers', App\Http\Controllers\SupplierController::class);

// Inventory Routes
Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/history', [App\Http\Controllers\InventoryController::class, 'history'])->name('inventory.history');
Route::get('/inventory/adjust/{product}', [App\Http\Controllers\InventoryController::class, 'adjust'])->name('inventory.adjust');
Route::put('/inventory/update/{product}', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventory.update');
