<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Transaction;
use App\Models\Coupon;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $product = Product::count();
        $coupon = Coupon::count();
            if(Auth::user()->role =='admin'){
                $transaksi = Transaction::count();
            }
            $transaksi = Transaction::where('user_id',Auth::user()->id)->count();

        // dd($transaksi);
        return view('dashboard.index',compact(['product','transaksi','coupon']));
    }
}
