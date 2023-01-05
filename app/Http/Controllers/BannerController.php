<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Yajra\DataTables\Facades\DataTables;
use Str;
use Illuminate\Support\Facades\Storage; 

class BannerController extends Controller
{
    public function create(){
        return view('admin.banner.create');
    }
    public function store(Request $request){
        $banner = new Banner;
        $banner->warna = $request->warna;
        $banner->text = $request->text;
                if($request->hasFile('gambar')){
                    $file = $request->file('gambar');
                    $filename = time().'.'.$file->getClientOriginalExtension();
                    $path = $file->storeAs('public/banner',$filename);
                    $file->move($path,$filename);
                    $banner->gambar = $path;
                }
        $banner->save();
        return redirect()->route('banner.index');
    }
    public function index(){
        if(request()->ajax()){
            $query = Banner::all();
             return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('action',function($item){
                        return
                        '
                        <div class="row">
                            <div class="col">
                        
                                <form class="" action="'. route('banner.destroy',$item->id) .'" method="POST">
                                <button class="btn btn-danger btn-sm">Hapus
                                </button>
                                '. method_field('delete'). csrf_field() .'
                                </form>
                            </div>
                        </div>
                        ';
                    })
                    ->editColumn('gambar', function($item){
                
                        return '<img style="max-width: 200px" src="'.Storage::url($item->gambar).'"/>';
                    })
                    ->rawColumns(['action','gambar'])
                    ->make(true); 
        }
        return view('admin.banner.index');
    }
    
    public function destroy(Banner $banner){
        Storage::delete($banner->gambar);
        $banner->delete();
        return redirect()->route('banner.index');
    }
}
