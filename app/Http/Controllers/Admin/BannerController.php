<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // /cek jika request ajax 
        if(request()->ajax()) {
           
            $query = Banner::query();
      

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
                                    <a class="dropdown-item" href="' .  route('banner.edit', $item->id) .'">Sunting</a>
                                    
                                    
                               


                                    <form action="'. route('banner.destroy', $item->id) .'" method="POST">
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
                   //edit column foto di db & lengkapi url foto
                   ->editColumn('photo', function($item) {
                       return $item->photo ? '<img src="'. Storage::url($item->photo).'" style="max-height: 60px; " />' : '';
                   })
                   ->rawColumns(['action', 'photo'])
                   ->make();
        }
        return view('pages.admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'string|required|max:50',
            'description'=>'string|nullable',
            'photo'=>'required|image',
            'status'=>'required|in:active,inactive',
        ]);
          
            $data = $request->all();

            //slug
            // $data['slug'] = Str::slug($request->title);
            $slug = Str::slug($request->title);
            $data['slug']= $slug;
            $data['photo'] = $request->file('photo')->store('assets/banner','public');
    
            $count=Banner::where('slug',$slug)->count();
            if($count>0){
                $slug= $slug.'-'.date('ymdis').'-'.rand(0,999);
            }
           
            // dd($data);
            //create
            $status = Banner::create($data);
          
            
            if($status){
                request()->session()->flash('success','Banner successfully added');
            }
            else{
                request()->session()->flash('error','Error occurred while adding banner');
            }
           
         
    
            return redirect()->route('banner.index');
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
        $item = Banner::findOrFail($id);

        return view('pages.admin.banner.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title'=>'string|required|max:50',
            'description'=>'string|nullable',
            'photo'=>'image|nullable',
            'status'=>'required|in:active,inactive',
        ]);
       
        // $data = $request->all();

        // //slug
        // $data['slug'] = Str::slug($request->title);
        // $data['photo'] = $request->file('photo')->store('assets/banner','public');

        // //temukan id
        // $item = Banner::findOrFail($id);
        // //lalu update
        // // dd($data);
        // $item->update($data);
        $item = Banner::findOrFail($id);
        if($request->has('photo'))
        {
            // request formgambar
            $gambar = $request->photo;
            // gabungkan waktu dan nama file gambarnya
            $newGambar = time().$gambar->getClientOriginalName();

            $gambar->move('assets/banner','public', $newGambar);

            // 2. maka penyimpanan gambar
            $banner_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'photo' => 'assets/banner','public'.$newGambar,
                'status' => $request->status,
               
                
            ];
    
        } 
        else {
                // 3. jika tidak terdapat gambar pada request. maka hanya field di bawah ini yang di isikan 
            $banner_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'status' => $request->status,
            
            
            ];
    

        }

        $item->update($banner_data);
    
        if($item){
            request()->session()->flash('success','Banner successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding banner');
        }

        return redirect()->route('banner.index');
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
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banner.index');
    }
}
