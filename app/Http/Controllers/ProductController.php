<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Faker\Factory as Faker;

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

    public function show(Product $product)
    {
        $product->load('images');

        return view('item-details', compact('product'));
    }

    public function showAllPlants(Request $request, $category = null) {
        $category = $category ?? $request->input('category');
        $query = Product::with('images');
        $countries = Product::select('country')->distinct()->pluck('country');

        if (!empty($category)) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('id', $category);
            });
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('price_order') && $request->price_order == 'cheapest') {
            $query->orderBy('price');
        } elseif ($request->has('price_order') && $request->price_order == 'expensive') {
            $query->orderBy('price', 'desc');
        }

        if ($request->has('country') && is_array($request->country) && count($request->country) > 0) {
            $query->whereIn('country', $request->country);
        }

        $products = $query->paginate(8);

        return view('all-plants', compact('products', 'countries'));
    }

    public function productsAdmin() {
        $products = Product::with('images')
                           ->orderBy('id', 'asc')
                           ->paginate(4);

        return view('manage-products', compact('products'));
    }


    public function productsEdit(Product $product) {
        $product->load('images');

        return view('edit-products', compact('product'));
    }

    public function productsAdd() {
        $images = Image::whereNull('product_id')->get();

        $categories = Category::all();

        return view('add-products', compact('categories', 'images'));
    }

    public function updateProduct(Request $request, Product $product) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'stockQuantity' => 'required|integer',
            'category_id' => 'required|integer',
            'imagePath' => 'required|string|exists:images,imagePath'
        ]);

        $product->update($data);

        // If you need to update the image or handle more complex operations, do that here

        return redirect()->route('mg-products.show')->with('success', 'Product updated successfully!');
    }
}
