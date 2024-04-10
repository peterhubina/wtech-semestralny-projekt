<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();

        $categories->each(function ($category) {
            $category->setRelation('products', $category->products->take(4));
        });

        return view('home', compact('categories'));
    }
}
