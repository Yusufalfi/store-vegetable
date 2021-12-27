<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use App\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;

class DashboardProductController extends Controller
{
    //
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with(['galleries', 'category'])->where('users_id', Auth::user()->id)->get();
        return view('pages.dashboard-products', compact('products'));
    }


    public function details(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user', 'category'])->findOrFail($id);
        $categories = Category::all();
        return view('pages.dashboard-products-details', compact('product', 'categories'));
    }

    public function uploadGallery(Request $request)
    {
        
        //input request nama dan foto dan slug
        $data = $request->all();
        // uplod foto (store/simpan ke folder assets)
        $data['photos'] = $request->file('photos')->store('assets/product', 'public');
        //create
        ProductGallery::create($data);

        return redirect()->route('dashboard-product-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-product-details', $item->products_id);
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard-products-create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $products = Product::create($data);

        $gallery = [
            'products_id' => $products->id,
            'photos' => $request->file('photo')->store('assets/product', 'public')
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product-store');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);
        $item->update($data);

        return redirect()->route('dashboard-products');
    }
}
