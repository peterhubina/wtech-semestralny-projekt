<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index'])->name('home.show');

Route::resource('users', UserController::class);

Route::get('/all-plants/{category?}', [ProductController::class, 'showAllPlants'])->name('all-plants.show');

Route::get('/info-page', function () {
    return view('info-page');
})->name('info-page.show');

Route::get('/shopping-cart', [CartController::class, 'index'])->name('shopping-cart.show');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.show');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout.process');

Route::post('/cart/{product}/add', [CartController::class, 'addToCart'])->name('cart.add');

// Admin section
Route::get('/manage-products', [ProductController::class, 'productsAdmin'])->name('mg-products.show');

Route::get('/manage-category', function () {
    return view('manage-category');
})->name('mg-category.show');

Route::get('/add-products', function () {
    return view('add-products');
})->name('add-products.show');

Route::get('/add-category', function () {
    return view('add-category');
})->name('add-category.show');

Route::get('/edit-products', function () {
    return view('edit-products');
})->name('edit-products.show');

Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');

Route::get('/edit-products/{product}', [ProductController::class, 'productsEdit'])->name('edit-products.show');

Route::get('/edit-category', function () {
    return view('edit-category');
})->name('edit-category.show');

Route::get('/item-details/{product}', [ProductController::class, 'show'])->name('item-details.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
