<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Product::all();
            return DataTables::of($query)
            // dd($query);
                    ->addIndexColumn()
                    ->addColumn('action',function($item){
                        return
                        '
                        <div class="row">
                            <div class="col">
                               <a href="'. route('product.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a> 
                            </div>
                            <div class="col">
                        
                                <form class="" action="'. route('product.destroy',$item->id) .'" method="POST">
                                <button class="btn btn-danger btn-sm">Hapus
                                </button>
                                '. method_field('delete'). csrf_field() .'
                                </form>
                            </div>
                        </div>
                        ';
                    })
                    ->editColumn('thumbnail', function($item){
                
                        return '<img style="max-width: 200px" src="'.Storage::url($item->thumbnail).'"/>';
                    })
                    ->rawColumns(['action','thumbnail'])
                    ->make(true); 
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $product = new Product;


        if($request->hasFile('thumbnail'))
        {
            $thumbnail = $request->file('thumbnail');
            $filename = time().'.'.$thumbnail->getClientOriginalExtension();
            $path = $thumbnail->storeAs('public/thumbnail',$filename);
            $thumbnail->move($path,$filename);
            $product->thumbnail = $path;
            // dd($path);
        }

        $product->name = $request->name;
        $product->slug = Str::slug($product->name);
        $product->stock = $request->stock;
        $product->caption = $request->caption;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->weight = $request->weight;
        $product->save();

        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        // dd($product);
        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->hasFile('thumbnail'))
        {
            $oldFile = $product->thumbnail;
            Storage::delete($oldFile);

            $thumbnail = $request->file('thumbnail');
            $filename = time().'.'.$thumbnail->getClientOriginalExtension();
            $path = $thumbnail->storeAs('public/thumbnail',$filename);
            $thumbnail->move($path,$filename);
            $product->thumbnail = $path;
            // dd($path);
        }

        $product->name = $request->name;
        $product->slug = Str::slug($product->name);
        $product->stock = $request->stock;
        $product->caption = $request->caption;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->weight = $request->weight;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->thumbnail);
        $product->delete();
        return redirect()->route('product.index');
    }
}
