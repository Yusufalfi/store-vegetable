<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // panggil model product serta relasinya yaitu galleries dan user
        $products = Product::with(['galleries','user'])->where('slug', $id)->firstOrFail();
        // dd($products);
        return view('pages.detail', compact('products'));
    }

    public function add( Request $request, $id)
    {
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];


        $cart = Cart::create($data);

        return redirect()->route('cart');
    }


}
