<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // panggil model Category dan ambil 4 category
        $categories = Category::all();
        // dd($banners);
        // panggil model Product dan panggil relasi Galleries dan take/ambil 8 Item foto
        $products = Product::with(['galleries'])->paginate(2);
        return view('pages.category', compact('categories', 'products'));
    }

    public function detail(Request $request, $slug)
    {
      
         // panggil model Category dan ambil 4 category
         $categories = Category::all();
         // dd($banners);
         // panggil model categori ambil field slud ambil data pertama sesuai slug 
         $categori = category::where('slug', $slug)->firstOrFail();
        //  dd($categori);
        // panggil model product yang berlelasi dengan galleri dmna ambil field categories_id dan panggil id field category
         $products = Product::with(['galleries'])->where('categories_id', $categori->id)->paginate(3);
        //  die($products);
         return view('pages.category_detail', compact('categories', 'products'));
    }
}
