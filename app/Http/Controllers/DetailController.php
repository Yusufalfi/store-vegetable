<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
         /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        // panggil model product serta relasinya yaitu galleries
        $products = Product::with(['galleries','user'])->where('slug', $id)->firstOrFail();
        // dd($products);
        return view('pages.detail', compact('products'));
    }


}
