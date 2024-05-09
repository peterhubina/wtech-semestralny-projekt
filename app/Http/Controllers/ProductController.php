<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::check()) {
            // User is authenticated, get the user and their cart from the database
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->where('status', Cart::STATUS_ACTIVE)->first();
        } else {
            // User is a guest, get the cart from the session
            $cart = session('cart', []);
        }

        return view('item-details', [
            'product' => $product,
            'cart' => $cart
        ]);
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

        if ($request->has('search')) {
            $request->validate([
                'search' => 'required|string'
            ], [
                'search.required' => 'The search field cannot be empty.',
            ]);

            $query->where('title', 'ILIKE', '%' . $request->search . '%');

            $request->flash();
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

        if ($request->has('type') && is_array($request->type) && count($request->type) > 0) {
            $query->whereIn('type', $request->type);
        }

        $products = $query->paginate(16);

        return view('all-plants', compact('products', 'countries'));
    }

    public function productsAdmin() {
        $products = Product::with('images')
                           ->orderBy('id', 'asc')
                           ->paginate(8);

        return view('manage-products', compact('products'));
    }


    public function productsEdit(Product $product) {
        $product->load('images');

        $temp = Image::whereNull('product_id')->get();
        $current = $product->images;

        $images = $current->merge($temp);
        $categories = Category::all();

        return view('edit-products', compact('product', 'categories', 'images'));
    }

    public function productsAdd() {
        $images = Image::whereNull('product_id')->get();

        $categories = Category::all();

        return view('add-products', compact('categories', 'images'));
    }

    public function addProduct(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'height' => 'required|string|max:10',
            'category_id' => 'required|integer',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'stockQuantity' => 'required|integer',
            'country' => 'required|string|max:255',
            'type' => 'required|string|max:10',
            'image' => 'required',
        ]);

        $faker = Faker::create();
        $data['productCode'] = $faker->bothify('?????-#####');

        // Handle the image upload
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets');
        $image->move($destinationPath, $name);
        $data['imagePath'] = '/assets/'.$name;

        $product = Product::create($data);

        /*
        $image = Image::where('imagePath', $request->imagePath)->first();
        if ($image) {
            $image->product_id = $product->id;
            $image->is_titular = true;
            $image->save();
        } else {
            return back()->withErrors(['imagePath' => 'Image not found.'])->withInput();
        }*/

        return redirect()->route('mg-products.show')->with('success', 'Product inserted successfully!');
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

        Image::where('product_id', $product->id)
        ->where('is_titular', true)
        ->update(['is_titular' => false]);

        $image = Image::where('imagePath', $request->imagePath)->first();
        if ($image) {
            $image->product_id = $product->id;
            $image->is_titular = true;
            $image->save();
        } else {
            return back()->withErrors(['imagePath' => 'Image not found.'])->withInput();
        }

        $product->update($data);

        return redirect()->route('mg-products.show')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct(Product $product) {
        // Image::where('product_id', $product->id)
        // ->update(['product_id' => null]);

        Image::where('product_id', $product->id)->delete();

        $product->delete();

        return redirect()->route('mg-products.show')->with('success', 'Product deleted successfully!');
    }

    public function categoryEdit(Category $category) {
        return view('edit-category', compact('category'));
    }

    public function categoryAdd() {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Category::create($data);

        return redirect()->route('mg-category.show')->with('success', 'Category inserted successfully!');
    }

    public function categoryAdmin() {
        $categories = Category::orderBy('id', 'asc')
                       ->paginate(8);

        return view('manage-category', compact('categories'));
    }
    /*
    public function search(Request $request) {
        $searchTerm = $request->input('search');

        $products = Product::with('images')
            ->where('title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
            ->paginate(8);

        return view('all-plants', compact('products'));
    }*/

    public function getPrice($id)
    {
        $product = Product::find($id);
        return response()->json($product->price);
    }
}
