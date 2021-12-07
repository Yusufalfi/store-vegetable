<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\ProductRequest;
use App\User;
use App\Category;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //cek jika request ajax maka actionnya berbeda  
        if(request()->ajax()) {
            //panggil model product berdasrkan relasi, casenya relasi user dan category
            $query = Product::with(['user', 'category']);

            return Datatables::of($query)
                   ->addColumn('action', function($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                        type="button"
                                        data-toggle="dropdown">
                                        Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' .  route('product.edit', $item->id) .'">Sunting</a>
                                    <form action="'. route('product.destroy', $item->id) .'" method="POST">
                                        '. method_field('delete'). csrf_field(). '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                   })
                   
                   ->rawColumns(['action'])
                   ->make();
        }
        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.product.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //input request nama dan foto dan slug
        $data = $request->all();
        

        $data['slug'] = Str::slug($request->name);
        //create
      $product =   Product::create($data);
    //   dd($product);

        
        if($product){
            request()->session()->flash('success','Product successfully added');
        }
        else{
            request()->session()->flash('error','Product failed to adds');
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Product::findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.product.edit', compact('item', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
         //input request nama dan foto dan slug
        $data = $request->all();

        //temukan id
        $item = Product::findOrFail($id);

         $data['slug'] = Str::slug($request->name);
        //lalu update
        $item->update($data);

        if($item){
            request()->session()->flash('success','Product successfully updated');
        }
        else{
            request()->session()->flash('error','Product failed to updated');
        }


        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('product.index');
    }
}
