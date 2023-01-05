<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use DataTables;

class CouponController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            # code...
            $query = Coupon::all();
            return DataTables::of($query)
            ->addIndexColumn()
                ->addColumn('action',function($item){
                    return
                    '
                    <div class="row">
                        <div class="col">
                           <a href="'. route('coupon.edit',$item->id) .'" class="btn btn-sm btn-warning">Edit</a> 
                        </div>
                        <div class="col">
                    
                            <form class="" action="'. route('coupon.destroy',$item->id) .'" method="POST">
                            <button class="btn btn-danger btn-sm">Hapus
                            </button>
                            '. method_field('delete'). csrf_field() .'
                            </form>
                        </div>
                    </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
            } 
                return view('admin.coupon.index');
    }

    public function create(){
        return view('admin.coupon.create');
    }


    public function store(Request $request){
        $coupon = new Coupon;

        $coupon->create($request->all());
        return redirect()->route('coupon.index');
    }
    public function edit($id){

        $coupon = Coupon::find($id);
        // dd($coupon);
        return view('admin.coupon.edit',compact(['coupon']));
    }
    public function update(Request $request, $id){
        $coupon = Coupon::find($id);
        $coupon->update($request->all());
        return redirect()->route('coupon.index');

    }
    public function destroy($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return back();
    }
}
