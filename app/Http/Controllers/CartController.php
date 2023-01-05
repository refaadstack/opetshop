<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cartAdd(Request $request , $id)
    {
        $cart = Cart::where('product_id',$id)->where('user_id',Auth::user()->id);
        if($cart->count()){
            $cart->increment('quantity');
            $cart = $cart->first();
        }else{
            $data = [
                'product_id' => $id,
                'user_id' => Auth::user()->id,
                'quantity' => 1,
            ];
            Cart::create($data);
        }
        return redirect('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $carts = DB::table('carts')->
        join('users','users.id','carts.user_id')
        ->join('products as p','p.id','carts.product_id')
        ->select('carts.*','p.id as prod_id','p.*')
        ->get();

        return view('front.cart',compact(['carts']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::where('product_id',$id)->first();
        $cart->delete();
        return redirect()->route('cart');
    }
}
