<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\banner;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::where('status','active')->limit(3)->orderBy('id','DESC')->get();
        // panggil model Category dan ambil 4 category
        $categories = Category::take(6)->get();
      
        // dd($banners);

        // panggil model Product dan panggil relasi Galleries dan take/ambil 8 Item foto
        $products = Product::with(['galleries'])->take(8)->get();
        // dd($products);
        return view('pages.home', compact('categories', 'products', 'banners'));
    }
}
