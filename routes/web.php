<?php

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

Route::get('/all-plants', function () {
    return view('all-plants');
})->name('all-plants.show');


Route::get('/home', function () {
    return view('home');
})->name('home.show');

use App\Http\Controllers\UserController;
Route::resource('users', UserController::class);