<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/all-plants', function () {
    return view('all-plants');
})->name('all-plants.show');

Route::get('/info-page', function () {
    return view('info-page');
})->name('info-page.show');

Route::get('/shopping-cart', function () {
    return view('shopping-cart');
})->name('shopping-cart.show');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout.show');

// Admin section
Route::get('/manage-products', function () {
    return view('manage-products');
})->name('mg-products.show');

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

Route::get('/edit-category', function () {
    return view('edit-category');
})->name('edit-category.show');

Route::get('/item-details/{product}', [ProductController::class, 'show'])->name('item-details.show');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

