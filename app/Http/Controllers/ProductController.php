<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::with(['products' => function ($query) {
            $query->take(4);
        }])->get();

        return view('home', compact('categories'));
    }
}
