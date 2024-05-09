<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
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
Route::post('/shopping-cart/update', [CartController::class, 'updateCart'])->name('shopping-cart.update');
Route::post('/shopping-cart/remove', [CartController::class, 'removeItem'])->name('shopping-cart.remove');
Route::post('/shopping-cart/{product}', [CartController::class, 'addToCart'])->name('shopping-cart.add');
Route::post('/empty-cart', [CartController::class, 'emptyCart'])->name('empty-cart');
Route::post('/account-cart', [CartController::class, 'accountCart'])->name('account-cart');
Route::post('/guest-cart', [CartController::class, 'guestCart'])->name('guest-cart');
Route::post('/merge-carts', [CartController::class, 'mergeCarts'])->name('merge-carts');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.show');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout.process');

Route::get('/item-details/{product}', [ProductController::class, 'show'])->name('item-details.show');

Route::get('/all-plants/', [ProductController::class, 'showAllPlants'])->name('all-plants.search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin section

Route::get('/admin', function () {
    return view('auth/admin-login');
})->name('admin.show');

Route::post('/admin-login', [LoginController::class, 'adminLogin'])->name('admin-login');

Route::middleware(['admin'])->group(function () {
    Route::get('/manage-products', [ProductController::class, 'productsAdmin'])->name('mg-products.show');

    Route::get('/manage-category', [ProductController::class, 'categoryAdmin'])->name('mg-category.show');

    Route::get('/add-products', [ProductController::class, 'productsAdd'])->name('add-products.show');

    Route::get('/add-category', function () {
        return view('add-category');
    })->name('add-category.show');

    Route::put('/product-edit/{product}', [ProductController::class, 'updateProduct'])->name('product.update');

    Route::put('/product-add', [ProductController::class, 'addProduct'])->name('product.add');

    Route::get('/edit-products/{product}', [ProductController::class, 'productsEdit'])->name('edit-products.show');

    Route::get('/delete-product/{product}', [ProductController::class, 'deleteProduct'])->name('delete-products.show');

    Route::get('/edit-category/{category}', [ProductController::class, 'categoryEdit'])->name('edit-category.show');
});

require __DIR__ . '/auth.php';
