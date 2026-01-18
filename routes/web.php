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
Route::resource('tables', App\Http\Controllers\RestaurantTableController::class);
Route::patch('/tables/{table}/status', [App\Http\Controllers\RestaurantTableController::class, 'updateStatus'])->name('tables.updateStatus');

// Inventory Routes
Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/history', [App\Http\Controllers\InventoryController::class, 'history'])->name('inventory.history');
Route::get('/inventory/adjust/{product}', [App\Http\Controllers\InventoryController::class, 'adjust'])->name('inventory.adjust');
Route::put('/inventory/update/{product}', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventory.update');
Route::resource('ingredients', App\Http\Controllers\IngredientController::class);
Route::resource('purchases', App\Http\Controllers\PurchaseController::class);

// Management Routes
Route::resource('orders', App\Http\Controllers\OrderController::class)->only(['index', 'show']);
Route::patch('/orders/{order}/status', [App\Http\Controllers\OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::post('/orders/{order}/cancel', [App\Http\Controllers\OrderController::class, 'cancel'])->name('orders.cancel');
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('discounts', App\Http\Controllers\DiscountController::class);
Route::post('/discounts/verify', [App\Http\Controllers\DiscountController::class, 'verify'])->name('discounts.verify');


// Reports Routes
Route::prefix('reports')->group(function () {
    Route::get('/', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('/sales', [App\Http\Controllers\ReportController::class, 'sales'])->name('reports.sales');
    Route::get('/products', [App\Http\Controllers\ReportController::class, 'products'])->name('reports.products');
    Route::get('/staff', [App\Http\Controllers\ReportController::class, 'staff'])->name('reports.staff');
    Route::get('/inventory', [App\Http\Controllers\ReportController::class, 'inventory'])->name('reports.inventory');
    Route::get('/export/{type}', [App\Http\Controllers\ReportController::class, 'export'])->name('reports.export');
});

Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
Route::post('/settings', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');

// POS Routes
Route::middleware('auth')->group(function () {
    Route::get('/pos', [App\Http\Controllers\PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [App\Http\Controllers\PosController::class, 'store'])->name('pos.store');
    Route::get('/pos/invoice/{order}', [App\Http\Controllers\PosController::class, 'invoice'])->name('pos.invoice');
});
